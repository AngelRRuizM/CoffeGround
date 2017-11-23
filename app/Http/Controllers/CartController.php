<?php

namespace App\Http\Controllers;

use App\Cart;
use App;
use App\Mail\OrderProcessed;
use App\Mail\Order;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Presentation;
use Illuminate\Http\Request;
use App\Models\Auth\User\User;

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

    /**
     * Realiza el pedido y envía correos de confirmación al usuario y a los administradores
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function makeOrder()
    {
        $user = auth()->user();
        $cart = $user->carts->first();

        /*foreach($cart->presentations as $presentation){
            if($request('presentation_'.$presentation->id) != null){
                $presentation->pivot->quantity = $request('presentation_'.$presentation->id);
                $presentation->pivot->save();
            }
        }
    
        foreach($cart->products as $product){
            if($request('product_'.$product->id) != null){
                $product->pivot->quantity = $request('product_'.$product->id);
                $product->pivot->save();
            }
        }*/
        
        Mail::to($user)->send(new OrderProcessed($user));

        foreach(User::all() as $destiny){
            if($destiny->hasRole('administrator') || $destiny->hasRole('subadministrator')){
                Mail::to($destiny)->send(new Order($user));
            }
        }

        $cart->presentations()->detach();
        $cart->products()->detach();

        session()->flash('message', 'Tu pedido se ha realizado con éxito, revisa tu email para mayor información.');
        return redirect( route('cart'));
    }
}