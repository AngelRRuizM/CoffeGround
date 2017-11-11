<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Obtiene todos los tipos de café y los pasa a index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        
        return view('admin.types.index', compact('types'));
    }

    /**
     * Muestra el formulario para crear "tipos"
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Obtiene los campos del nuevo tipo, los verifica y los guarda
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
                ->withInput($request)
                ->withErrors($validator);
        }
        //crea y guarda el nuevo tostado
        $type = new Type;
        $name_en = $request->name_en;
        $description_en = $request->description_en;
        $name_es = $request->name_es;
        $description_es = $request->descritpion_es;
        $type->save();

        session()->flash('message', 'El nuevo tipo ha sido guardado correctamente.');
        return redirect('/admin/types');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        if($type==null){
            $errors = ['No se ha encontrado el id especificado'];
            return redirect()->back()->withErrors($errors);
        }

        return view('admin.types.show', compact('type'));
    }

    /**
     * Muestra el formulario para cambiar la información del "tipo".
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        if($type==null){
            $errors = ['No se ha encontrado el id especificado'];
            return redirect()->back()->withErrors($errors);
        }

        return view('admin.types.edit', compact('type'));
    }

    /**
     * Actualiza el tipo especificado con información nueva
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        if($type==null){
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
                ->withInput($request)
                ->withErrors($validator);
        }
        //guarda el nuevo tostado
        $name_en = $request->name_en;
        $description_en = $request->description_en;
        $name_es = $request->name_es;
        $description_es = $request->descritpion_es;
        $type->save();

        session()->flash('message', 'Los cambios al tipo han sido guardados correctamente.');
        return redirect('/admin/types');
    }

    /**
     * Elimina al tipo seleccionado de la base de datos
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        if($type==null){
            $errors = ['No se ha encontrado el id especificado'];
            return redirect()->back()->withErrors($errors);
        }

        $type->delete();
        return redirect('admin/types/index');
    }
}
