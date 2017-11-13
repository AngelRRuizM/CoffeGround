<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ground;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroundController extends Controller
{
    /**
     * Obtiene todos los tipos de molido y los pasa a index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $grounds = Ground::all();

        return view('admin.grounds.index', compact('grounds'));
    }

    /**
     * Muestra el formulario para crear un nuevo molido.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.grounds.create');
    }

    /**
     * Obtiene los campos del nuevo molido, los verifica y los guarda.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //verifica que los datos estén presentes y con la longitud requerida
       $validator = Validator::make($request->all(), [
            'name_es' => 'required|max:100',
            'description_en' => 'required|max:500',
            'name_en' => 'required|max:100',
            'description_es' => 'required|max:500',   
        ]);
        
        //regresa a la página anterior si hubo algun error en los datos recibidos
        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        //crea y guarda el nuevo molido
        $ground = new Ground;
        $ground->name_en = $request->name_es;
        $ground->description_en = $request->description_en;
        $ground->name_es = $request->name_en;
        $ground->description_es = $request->description_es;
        $ground->save();

        session()->flash('message', 'El nuevo elemento ha sido guardado correctamente.');
        return redirect( route('admin.grounds') );
    }

    /**
     * Muestra los molidos.
     *
     * @param  \App\Ground  $ground
     * @return \Illuminate\Http\Response
     */
    public function show(Ground $ground)
    {
            if($ground == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        return view('admin.grounds.show', compact('ground'));
    }

    /**
     * Muestra el formulario para cambiar la información del molido.
     *
     * @param  \App\Ground  $ground
     * @return \Illuminate\Http\Response
     */
    public function edit(Ground $ground)
    {
        if($ground == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        return view('admin.grounds.edit', compact('ground'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ground  $ground
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ground $ground)
    {
        if($ground==null){
            $errors = ['No se ha encontrado el id especificado'];
            return redirect()->back()->withErrors($errors);
        }

        //verifica que los datos estén presentes y que cuenten con la longitud adecuada
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|max:100',
            'description_en' => 'required|max:500',
            'name_es' => 'required|max:100',
            'description_es' => 'required|max:500',
        ]);

        //regresa a la página anterior si hubo algún error en los datos recibidos.
        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        //guarda el nuevo tostado
        $ground->name_en = $request->name_en;
        $ground->description_en = $request->description_en;
        $ground->name_es = $request->name_es;
        $ground->description_es = $request->description_es;
        $ground->save();

        session()->flash('message', 'Los cambios al tipo de molido han sido guardados correctamente.');
        return redirect( route('admin.grounds.show', ['ground' => $ground->id]) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ground  $ground
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ground $ground)
    {
        if($ground == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        $ground->delete();

        session() -> flash('message', 'El tipo de molido se ha eliminado correctamente'); 
        return redirect(route ('admin.grounds') );
    }
}
