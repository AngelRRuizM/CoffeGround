<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use App\Models\Grounds;
use Illuminate\Http\Request;

class PresentationController extends Controller
{

    /**
     * Guarda una nueva instancia presentacion con los datos proporcionados en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'weight' => 'required|max:15',
            'price' => 'required|min:0|numeric',
            'gorund_id' => 'required|numeric',
            'coffee_id' => 'required|numeric']);

        if($validator->fails()){
            return redirect()->back()
                ->withInput($request)
                ->withErrors($validator);
        }
        
        $presentation = new Presentation;
        $presentation->weight = $request->weight;
        $presentation->price = $request->price;
        $presentation->ground_id = $request->ground_id;
        $presentation->coffee_id = $request->coffee_id;
        $coffee->save();

        session()->flash('message', 'El nuevo elemento ha sido guardado correctamente.');
        return redirect('/admin/coffees');
    }

    /**
     * Muestra la forma de edicion de la presentacion seleccionada
     *
     * @param  \App\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function edit(Presentation $presentation)
    {
        if($presentation == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        $grounds = Type::all()->sortBy('name_es');

        return view('admin.presentations.edit', compact('presentation', 'grounds'));
    }

    /**
     * Actualiza la instancia presentacion seleccionada con los datos proporcionados y la guarda en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presentation $presentation)
    {
        $validator = Validator::make($request->all(), [
            'weight' => 'required|max:15',
            'price' => 'required|min:0|numeric',
            'gorund_id' => 'required|numeric',
            'coffee_id' => 'required|numeric']);

        if($validator->fails()){
            return redirect()->back()
                ->withInput($request)
                ->withErrors($validator);
        }
        
        $presentation = new Presentation;
        $presentation->weight = $request->weight;
        $presentation->price = $request->price;
        $presentation->ground_id = $request->ground_id;
        $presentation->coffee_id = $request->coffee_id;
        $coffee->save();

        session()->flash('message', 'La base de datos ha sido actualizada correctamente.');
        return redirect('/admin/coffees');
    }

    /**
     * Elimina la instancia presentacion seleccionada
     *
     * @param  \App\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presentation $presentation)
    {
        if($presentation == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        $presentation->delete();
        return redirect('admin.coffees.index');
    }
}
