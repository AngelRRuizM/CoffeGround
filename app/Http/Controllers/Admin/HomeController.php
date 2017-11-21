<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;
use App\Models\CoffeeCategory;
use App\Models\Type;
use App\Models\Toast;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['cart']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index');
    }

    public function cindex()
    {
        $toasts = Toast::all();
        $types = Type::all();
        $coffeeCategories = CoffeeCategory::all();
        $coffees = Coffee::all();
        return view('home.coffees.index', compact('coffees', 'toasts', 'types', 'coffeeCategories'));
    }

    public function pindex()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();  
        $products = Product::all();
        return view('home.products.index', compact('products', 'subcategories', 'categories'));
    }

    public function cshow(Coffee $coffee){
        return view('home.coffees.show', compact('coffee'));
    }
}
