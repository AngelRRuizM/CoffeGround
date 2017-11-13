<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

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
                ->withInput($request)
                ->withErrors($validator);
        }
        
        $subcategory = new Subcategory;
        $subcategory->name_es = $request->name_es;
        $subcategory->name_en = $request->name_en;
        $subcategory->description_es = $request->description_es;
        $subcategory->description_en = $request->description_en;
        $subcategory->category_id = $request->type_id;
        $subcategory->save();

        session()->flash('message', 'El nuevo elemento ha sido guardado correctamente.');
        return redirect('/admin/subcategories');
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


        return view('admin.subcategories.edit', compact('subcategory'));
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
            'description_en' => 'required|max:500',]);

        if($validator->fails()){
            return redirect()->back()
                ->withInput($request)
                ->withErrors($validator);
        }
        
        $subcategory->name_es = $request->name_es;
        $subcategory->name_en = $request->name_en;
        $subcategory->description_es = $request->description_es;
        $subcategory->description_en = $request->description_en;
        $subcategory->save();

        session()->flash('message', 'La base de datos ha sido actualizada correctamente');
        return redirect('/admin/subcategories');
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

        $subcategory->delete();
        return redirect('admin/subcategories/index');
    }
}
