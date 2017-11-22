<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Coffee;
use App\Models\CoffeeCategory;
use App\Models\Presentation;
use App\Models\Type;
use App\Models\Toast;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Cart;

class HomeController extends Controller
{
    /**
    * Muestra la pagina principal
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('home.index');
    }

    /**
    * Muestra la pagina de cafés
    *
    * @return \Illuminate\Http\Response
    */
    public function cindex()
    {   
        $toasts = Toast::all();
        $types = Type::all();
        $coffeeCategories = CoffeeCategory::all();
        if(App::getLocale() == 'en'){
            $coffees = Coffee::all()->sortBy('name_en');
            $lan = false;
        }
        else{
            $coffees = Coffee::all()->sortBy('name_es');
            $lan =  true;
        }
        return view('home.coffees.index', compact('coffees', 'toasts', 'types', 'coffeeCategories', 'lan'));
    }

    
    /**
    * Muestra la pagina de productos
    *
    * @return \Illuminate\Http\Response
    */
    public function pindex()
    {   
        $categories = Category::all();
        $subcategories = Subcategory::all();
        if(App::getLocale() == 'en'){
            $products = Product::all()->sortBy('name_en');
            $lan = false;
        }
        else{
            $products = Product::all()->sortBy('name_es');
            $lan = true;
        }
        return view('home.products.index', compact('products', 'categories', 'subcategories', 'lan'));
    }

    /**
    * Muestra las especificaciones de un café
    *
    * @param  \App\Coffee  $coffee
    * @return \Illuminate\Http\Response
    */
    public function cshow(Coffee $coffee)
    {
        if(App::getLocale() == 'en'){
            $lan = false;
        }
        else{
            $lan = true;
        }

        return view('home.coffees.show', compact('coffee', 'lan'));
    }

    /**
    * Muestra las especificaciones de un café
    *
    * @param  \App\Coffee  $coffee
    * @return \Illuminate\Http\Response
    */
    public function pshow(Product $product)
    {
        if(App::getLocale() == 'en')
            $lan = false;
        else
            $lan = true;
        
        return view('home.products.show', compact('product', 'lan'));
    }

    /**
    * Muestra las especificaciones de un café
    *
    * @param  \App\Coffee  $coffee
    * @return \Illuminate\Http\Response
    */
    public function filterCoffees()
    {
        if(App::getLocale() == 'en')
            $lan = false;
        else
            $lan = true;

        $query = null;

        if(request('coffee_category') > 0){
            $query = Coffee::where('coffee_category_id', request('coffee_category'));
        }

        if(request('type') > 0){
            if($query != null)
                $query = $query->where('type_id', request('type'));
            else
                $query = Coffee::where('type_id', request('type'));
        }
            
        if(request('toast') > 0){
            if($query != null)
                $query = $query->where('toast_id', request('toast'));
            else
                $query = Coffee::where('toast_id', request('toast'));
        }

        if($query == null)
            $coffees = Coffee::all();
        else
            $coffees = $query->get();
        
        $view = view('home.coffees.list', compact('coffees', 'lan'));
        return $view->render();
    }

    public function filterProducts()
    {
        if(App::getLocale() == 'en')
            $lan = false;
        else
            $lan = true;

        $query = null;

        if(request('category') > 0){
            $subcategories = Subcategory::where('category_id', request('category'))->get(['id'])->toArray();
            $query = Product::whereIn('subcategory_id', $subcategories);
        }

        if(request('subcategory') > 0){
            if($query != null)
                $query = $query->where('subcategory_id', request('subcategory'));
            else
                $query = Product::where('subcategory_id', request('subcategory'));
        }

        if($query == null)
            $products = Product::all();
        else
            $products = $query->get();
        
        $view = view('home.products.list', compact('products', 'lan'));
        return $view->render();
    }
}