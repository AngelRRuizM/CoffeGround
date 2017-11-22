<?php

namespace App\Http\Controllers;

use App\Cart;

use App;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Presentation;
use Illuminate\Http\Request;

class CartController extends Controller
{
     /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cart()
    {
        $user = auth()->user();

        if(App::getLocale() == 'en'){
            $lan = false;
        }
        else{
            $lan = true;
        }

        $products =  $user->carts->first()->products;
        $coffees = $user->carts->first()->presentations;

        return view('home.cart', compact('products', 'coffees', 'lan'));
    }

    /**
     * Añade una presentacion al carrito
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function addPresentation(Presentation $presentation)
    {
        $user = auth()->user();

        if(App::getLocale() == 'en')
            $lan = true;
        else
            $lan = false;

        $user->carts->first()->presentations()->attach($presentation);

        return redirect( route('cart'));
    }

    /**
     * Añade un producto al carrito
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Product $product)
    {
        $user = auth()->user();
        
        if(App::getLocale() == 'en')
            $lan = true;
        else
            $lan = false;
        

        $user->carts->first()->products()->attach($product);
        return redirect( route('cart'));
    }

    /**
     * Quita una presentacion al carrito
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroyPresentation(Presentation $presentation)
    {
        $user = auth()->user();
        $user->carts->first()->presentations()->detach($presentation);

        return redirect( route('cart'));
    }

    /**
     * Quita un producto al carrito
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroyProduct(Product $product)
    {
        $user = auth()->user();
        $user->carts->first()->products()->detach($product);

        return redirect( route('cart'));
    }
}