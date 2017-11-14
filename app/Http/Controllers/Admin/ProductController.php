<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->sortBy('name_es');
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //verifica que los datos estén presentes y que cuenten con la longitud adecuada
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|max:100',
            'description_en' => 'required|max:500',
            'name_es' => 'required|max:100',
            'description_es' => 'required|max:500',
            'subcategory_id' => 'required|numeric',
        ]);

        //regresa a la página anterior si hubo algún error en los datos recibidos.
        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        //crea y guarda el nuevo tostado
        $product = new Product;
        $name_en = $request->name_en;
        $description_en = $request->description_en;
        $name_es = $request->name_es;
        $description_es = $request->descritpion_es;
        $subcategory_id = $request->subcategory_id;
        $product->save();

        session()->flash('message', 'El nuevo producto ha sido guardado correctamente.');
        return redirect(route('admin.products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if($product==null){
            $errors = ['No se ha encontrado el id especificado'];
            return redirect()->back()->withErrors($errors);
        }

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if($product==null){
            $errors = ['No se ha encontrado el id especificado'];
            return redirect()->back()->withErrors($errors);
        }

        $categories = Category::all()->sortBy('name_es');
        $subcategories = subCategory::all()->sortBy('name_es');
        return view('admin.products.edit', compact('product', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($product==null){
            $errors = ['No se ha encontrado el id especificado'];
            return redirect()->back()->withErrors($errors);
        }

        //verifica que los datos estén presentes y que cuenten con la longitud adecuada
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|max:100',
            'description_en' => 'required|max:500',
            'name_es' => 'required|max:100',
            'description_es' => 'required|max:500',
            'subcategory_id' => 'required|numeric',
        ]);

        //regresa a la página anterior si hubo algún error en los datos recibidos.
        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        //guarda el nuevo tostado
        $name_en = $request->name_en;
        $description_en = $request->description_en;
        $name_es = $request->name_es;
        $description_es = $request->descritpion_es;
        $subcategory_id = $request->subcategory_id;
        $product->save();

        session()->flash('message', 'Los cambios al producto han sido cambiados correctamente.');
        return redirect(route('admin.products.show', ['product'=>$product->id]));
    }

    /**
     * Elimina al producto seleccionado de la base de datos
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product==null){
            $errors = ['No se ha encontrado el id especificado'];
            return redirect()->back()->withErrors($errors);
        }
        $product->delete();
        session()->flash('message', 'El producto se ha eliminado con éxito.');        
        return redirect(route('admin.products'));
    }
}
