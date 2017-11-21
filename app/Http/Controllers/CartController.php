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

        $products =  $user->carts->first()->products();
        $coffees = $user->carts->first()->presentations();

        return view('home.cart', compact('products', 'coffees', 'lan'));
    }

    /**
     * Añade una presentacion al carrito
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function cadd(Presentation $presentation)
    {
        $user = auth()->user();
        
        if($user == null || $presentation == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        if(App::getLocale() == 'en'){
            $lan = true;
        }
        else{
            $lan = false;
        }

        $user->cart->firts()->presentations->attach($presentation);

        return redirect( route('coffees.show', ['coffee' => $presentation->id]));
    }

    /**
     * Añade un producto al carrito
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function padd(Product $product)
    {
        $user = auth()->user();

        if($user == null || $product == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        if(App::getLocale() == 'en'){
            $lan = true;
        }
        else{
            $lan = false;
        }

        $user->carts->first()->products->attach($product);

        return redirect( route('products.show', ['product' => $product->id]));
    }

    /**
     * Quita una presentacion al carrito
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function cdestroy(Presentation $presentation)
    {
        $user = auth()->user();

        if($user == null || $presentation == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }

        $user->carts->first()->presentations->detach($presentation);

        return redirect( route('cart', ['user' => $user->id]));
    }

    /**
     * Quita un producto al carrito
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function pdestroy(Product $product)
    {
        $user = auth()->user();
        
        if($user == null || $product == null){
            $errors = ['No se ha encontrado el id especificado.'];
            return redirect()->back()->withErrors($errors);
        }
        
        $user->carts->first()->products->detach($product);

        return redirect( route('cart', ['user' => $user->id]));
    }
}