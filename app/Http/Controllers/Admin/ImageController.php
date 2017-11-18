<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Coffee;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeProduct(Request $request, Product $product)
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
            $image->path = $file->store('productos/'.$product->id, 'public');
            $image->save();
            $image->products()->attach($product);
        }

        session()->flash('message', 'Imagen(es) agregada exitosamente.');
        return redirect( route('admin.products.show', ['product' => $product->id]) );
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
        $image->products()->detach();
        Storage::disk('public')->delete($image->path);

        session()->flash('message', 'La imagen se ha eliminado con éxito.');
        return redirect()->back();
    }
}
