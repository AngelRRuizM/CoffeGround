<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Presentation;
use App\Models\Ground;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'ground_id' => 'required|numeric',
            'coffee_id' => 'required|numeric']);

        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        
        $presentation = new Presentation;
        $presentation->weight = $request->weight;
        $presentation->price = $request->price;
        $presentation->ground_id = $request->ground_id;
        $presentation->coffee_id = $request->coffee_id;
        $presentation->save();

        session()->flash('message', 'La nueva presentación se ha creado exitosamente.');
        return redirect( route('admin.coffees.show', ['coffee' => $request->coffee_id]));
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

        $grounds = Ground::all()->sortBy('name_es');

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
            'ground_id' => 'required|numeric',
            'coffee_id' => 'required|numeric']);

        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        
        $presentation->weight = $request->weight;
        $presentation->price = $request->price;
        $presentation->ground_id = $request->ground_id;
        $presentation->coffee_id = $request->coffee_id;
        $presentation->save();

        session()->flash('message', 'Se ha actualizado la presentación del café.');
        return redirect( route('admin.coffees.show', ['coffee' => $request->coffee_id]));
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
        $coffee = $presentation->coffee;
        $presentation->delete();

        session()->flash('message', 'La presentación se ha eliminado exitosamente.');
        return redirect( route('admin.coffees.show', ['coffee' => $coffee->id]));
    }
}
