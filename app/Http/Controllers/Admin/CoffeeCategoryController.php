<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoffeeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoffeeCategoryController extends Controller
{
    // index, show, create, store, edit, update, delete.

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coffeeCategories = CoffeeCategory::all();
        return view('admin.coffeeCategories.index', compact('coffeeCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coffeeCategories.create');
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
                ->withInput($request->all())
                ->withErrors($validator);
        }
        
        $coffeeCategory = new CoffeeCategory;
        $coffeeCategory->name_es = $request->name_es;
        $coffeeCategory->name_en = $request->name_en;
        $coffeeCategory->description_es = $request->description_es;
        $coffeeCategory->description_en = $request->description_en;
        $coffeeCategory->save();

        session()->flash('message', 'El nuevo elemento ha sido guardado correctamente.');
        return redirect(route('admin.coffeeCategories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CoffeeCategory  $coffeeCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CoffeeCategory $coffeeCategory)
    {
            if($coffeeCategory == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        return view('admin.coffeeCategories.show', compact('coffeeCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CoffeeCategory  $coffeeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CoffeeCategory $coffeeCategory)
    {
       if($coffeeCategory == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        return view('admin.coffeeCategories.edit', compact('coffeeCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CoffeeCategory  $coffeeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoffeeCategory $coffeeCategory)
    {
        if($coffeeCategory == null){
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
        
        $coffeeCategory->name_es = $request->name_es;
        $coffeeCategory->name_en = $request->name_en;
        $coffeeCategory->description_es = $request->description_es;
        $coffeeCategory->description_en = $request->description_en;
        $coffeeCategory->save();

        session()->flash('message', 'La base de datos ha sido actualizada correctamente');
        return redirect(route('admin.coffeeCategories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CoffeeCategory  $coffeeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoffeeCategory $coffeeCategory)
    {
        if($coffeeCategory == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        $coffeeCategory->delete();
        session()->flash('message', 'La categoria de café se ha eliminado correctamente.');
        return redirect(route('admin.coffeeCategories'));
    }
}
