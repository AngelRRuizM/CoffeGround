<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCoffee(Request $request, Coffee $coffee)
    {
        $validator = Validator::make($request->all(), [
            'images' => 'Required',
            'images.*' => 'mimes:jpg,jpeg,png,bmp'
        ]);
        
        if($validator->fails()){
            return redirect()->back()
            ->withInput($request->all())
            ->withErrors($validator);
        }
        
        foreach($request->images as $file){
            $image = new Image;
            $image->path = $file->store('cafes/'.$coffee->id, 'public');
            $image->save();
            $image->coffees()->attach($coffee);
        }

        session()->flash('message', 'Imagen(es) agregada exitosamente.');
        return redirect( route('admin.coffees.show', ['coffee' => $coffee->id]) );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $coffee = $image->coffees->first();
        $image->coffees()->detach();
        Storage::disk('public')->delete($image->path);

        session()->flash('message', 'La imagen se ha eliminado con éxito.');
        return redirect( route('admin.coffees.show', ['coffee' => $coffee->id]) );
    }
}
