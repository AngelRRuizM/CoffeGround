<?php

namespace App\Http\Controllers;

use App\Ground;
use Illuminate\Http\Request;

class GroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $grounds = Ground::all();
        return view('admin.grounds.index', compact('grounds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.grounds.create');
    }

    /**
     * Store a newly created resource in storage.
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
                ->withInput($request)
                ->withErrors($validator);
        }
        
        $ground = new Ground;
        $ground->name_es = $request->name_es;
        $ground->name_en = $request->name_en;
        $ground->description_es = $request->description_es;
        $ground->description_en = $request->description_en;
        $ground->save();

        session()->flash('message', 'El nuevo elemento ha sido guardado correctamente.');
        return redirect('/admin/grounds');
    }

    /**
     * Display the specified resource.
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

        return view('admin.grounds.show', compact('grounds'));
    }

    /**
     * Show the form for editing the specified resource.
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

        return view('admin.grounds.edit', compact('grounds'));
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
        if($ground == null){
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
                ->withInput($request)
                ->withErrors($validator);
        }
        
        $ground->name_es = $request->name_es;
        $ground->name_en = $request->name_en;
        $ground->description_es = $request->description_es;
        $ground->description_en = $request->description_en;
        $ground->save();

        session()->flash('message', 'La base de datos ha sido actualizada correctamente');
        return redirect('/admin/grounds');
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
        return redirect('admin.grounds.index');
    }
}
