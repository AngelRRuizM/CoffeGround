<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Despliega una lista de todos las categorias
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Muestra el formulario para crear categorias
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Pide los campos de la nueva categoria y los guarda
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_es' => 'required|max:100',
            'name_en' => 'required|max:100',
            'description_es' => 'required|max:500',
            'description_en' => 'required|max:500',
        ]);

        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        
        $category = new Category;
        $category->name_es = $request->name_es;
        $category->name_en = $request->name_en;
        $category->description_es = $request->description_es;
        $category->description_en = $request->description_en;
        $category->save();

        session()->flash('message', 'El nuevo elemento ha sido guardado correctamente.');
        return redirect(route('admin.categories'));
    }

    /**
     * Muestra la categoria especificada
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if($category == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Muestra el formulario de edicion de la categoria seleccionada
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if($category == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Guarda los campos proporcionados en la categoria seleccionada
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if($category == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        $validator = Validator::make($request->all(), [
            'name_es' => 'required|max:100',
            'name_en' => 'required|max:100',
            'description_es' => 'required|max:500',
            'description_en' => 'required|max:500',
        ]);

        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        
        $category->name_es = $request->name_es;
        $category->name_en = $request->name_en;
        $category->description_es = $request->description_es;
        $category->description_en = $request->description_en;
        $category->save();

        session()->flash('message', 'La base de datos ha sido actualizada correctamente');
        return redirect(route('admin.categories.show', ['category'=>$category->id]));
    }

    /**
     * Quita la categoria seleccionada de la base de datos
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        $category->delete();
        return redirect(route('admin.categories'));
    }
}
