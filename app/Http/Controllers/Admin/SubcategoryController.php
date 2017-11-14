<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
{
    

    /**
     * Guarda una nueva instancia de subcategoria con los campos proporcionados
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
            'category_id' => 'required|numeric',]);

        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        
        $subcategory = new Subcategory;
        $subcategory->name_es = $request->name_es;
        $subcategory->name_en = $request->name_en;
        $subcategory->description_es = $request->description_es;
        $subcategory->description_en = $request->description_en;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        session()->flash('message', 'La nueva subcategoria ha sido guardado correctamente.');
        return redirect(route('admin.categories.show', ['category'=>$request->category_id]));
    }


    /**
     * Muestra el formulario de edicion de la subcategoria seleccionada
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        if($subcategory == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        $categories = Category::all()->sortBy('name_es');

        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Actualiza la subcategoria seleccionada con los datos proporcionados y la guarda
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        if($subcategory == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        $validator = Validator::make($request->all(), [
            'name_es' => 'required|max:100',
            'name_en' => 'required|max:100',
            'description_es' => 'required|max:500',
            'description_en' => 'required|max:500',
            'category_id' => 'required|numeric']);

        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        
        $subcategory->name_es = $request->name_es;
        $subcategory->name_en = $request->name_en;
        $subcategory->description_es = $request->description_es;
        $subcategory->description_en = $request->description_en;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        session()->flash('message', 'La base de datos ha sido actualizada correctamente');
        return redirect(route('admin.categories.show', ['category' => $request->category_id]));
    }

    /**
     * Elimina la instacia subcategoria seleccionada de la base de datos
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        if($subcategory == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }
        $category = $subcategory->category;
        $subcategory->delete();
        return redirect(route('admin.categories.show', ['category'=>$category->id]));
    }
}
