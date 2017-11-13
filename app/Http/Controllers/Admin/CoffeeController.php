<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coffee;
use App\Models\Type;
use App\Models\Toast;
use App\Models\CoffeeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coffees = Coffee::all();

        return view('admin.coffees.index', compact('coffees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all()->sortBy('name_es');
        $toasts = Toast::all()->sortBy('name_es');
        $coffeeCategories = CoffeeCategory::all()->sortBy('name_es');

        return view('admin.coffees.create', compact('types', 'toasts', 'coffeeCategories'));
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
            'type_id' => 'required|numeric',
            'toast_id' => 'required|numeric',
            'coffee_category_id' => 'required|numeric'
        ]);

        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        
        $coffee = new Coffee;
        $coffee->name_es = $request->name_es;
        $coffee->name_en = $request->name_en;
        $coffee->description_es = $request->description_es;
        $coffee->description_en = $request->description_en;
        $coffee->type_id = $request->type_id;
        $coffee->toast_id = $request->toast_id;
        $coffee->coffee_category_id = $request->coffee_category_id;
        $coffee->save();

        session()->flash('message', 'El nuevo café se ha creado con exito.');
        return redirect(route('admin.coffees'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coffee  $coffee
     * @return \Illuminate\Http\Response
     */
    public function show(Coffee $coffee)
    {
        if($coffee == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        return view('admin.coffees.show', compact('coffee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coffee  $coffee
     * @return \Illuminate\Http\Response
     */
    public function edit(Coffee $coffee)
    {
        $types = Type::all()->sortBy('name_es');
        $toasts = Toast::all()->sortBy('name_es');
        $coffeeCategories = CoffeeCategory::all()->sortBy('name_es');

        return view('admin.coffees.edit', compact('coffee', 'types', 'toasts', 'coffeeCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coffee  $coffee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coffee $coffee)
    {
        $validator = Validator::make($request->all(), [
            'name_es' => 'required|max:100',
            'name_en' => 'required|max:100',
            'description_es' => 'required|max:500',
            'description_en' => 'required|max:500',
            'type_id' => 'required|numeric',
            'toast_id' => 'required|numeric',
            'coffee_category_id' => 'required|numeric'
        ]);

        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        
        $coffee->name_es = $request->name_es;
        $coffee->name_en = $request->name_en;
        $coffee->description_es = $request->description_es;
        $coffee->description_en = $request->description_en;
        $coffee->type_id = $request->type_id;
        $coffee->toast_id = $request->toast_id;
        $coffee->coffee_category_id = $request->coffee_category_id;
        $coffee->save();

        session()->flash('message', 'El café '.$coffee->name_es.' se ha actualizado con éxito.');
        return redirect( route('admin.coffees.show', ['coffee' => $coffee->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coffee  $coffee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coffee $coffee)
    {
        $coffee->delete();

        session()->flash('message', 'El café se ha eliminado con éxito.');
        return redirect( route('admin.coffees') );
    }
}
