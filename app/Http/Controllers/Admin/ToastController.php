<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Toast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ToastController extends Controller
{
    /**
     * Obtiene todos los tipos de tostado y los pasa a index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toasts = Toast::all();
        
        return view('admin.toasts.index', compact('toasts'));
    }

    /**
     * Muestra el formulario para crear tostados.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.toasts.create');
    }

    /**
     * Pide los campos del nuevo tipo de tostado y los guarda
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
        ]);

        //regresa a la página anterior si hubo algún error en los datos recibidos.
        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        //crea y guarda el nuevo tostado
        $toast = new Toast;
        $toast->name_en = $request->name_en;
        $toast->description_en = $request->description_en;
        $toast->name_es = $request->name_es;
        $toast->description_es = $request->description_es;
        $toast->save();

        session()->flash('message', 'El nuevo tipo de tostado ha sido guardado correctamente.');
        return redirect(route('admin.toasts'));
    }

    /**
     * Muestra el tostado especificado
     *
     * @param  \App\Toast  $toast
     * @return \Illuminate\Http\Response
     */
    public function show(Toast $toast)
    {
        if($toast == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        return view('admin.toasts.show', compact('toast'));
    }

    /**
     * Muestra el formulario para modificar la información del tipo de tostado
     *
     * @param  \App\Toast  $toast
     * @return \Illuminate\Http\Response
     */
    public function edit(Toast $toast)
    {
        if($toast == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        return view('admin.toasts.edit', compact('toast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Toast  $toast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toast $toast)
    {
        if($toast == null){
            $errors = ['No se ha encontrado el id especificado.'];
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
        //guarda los cambios al tostado
        $toast->name_en = $request->name_en;
        $toast->description_en = $request->description_en;
        $toast->name_es = $request->name_es;
        $toast->description_es = $request->description_es;
        $toast->save();

        session()->flash('message', 'Los cambios al tostado han sido guardados correctamente.');
        return redirect(route('admin.toasts.show', ['toast' => $toast->id]));
    }

    /**
     * Elimina el tostado especificado de la base de datos
     *
     * @param  \App\Toast  $toast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toast $toast)
    {
        if($toast == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }
        
        $toast->delete();
        return redirect(route('admin.toasts'));
    }
}
