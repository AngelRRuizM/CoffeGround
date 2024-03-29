<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    if (config('auth.users.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['admin']], function () {

    // Dashboard
    Route::get('/', 'UserController@index')->name('dashboard');
    
    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');

    //Images
    Route::get('imagenes/delete/{image}', 'ImageController@destroy')->name('images.destroy');

    //Subcategory
    Route::get('subcategorias/{subcategory}/editar', 'SubcategoryController@edit')->name('subcategories.edit');
    Route::post('subcategorias', 'SubcategoryController@store')->name('subcategories.store');
    Route::put('subcategorias/{subcategory}', 'SubcategoryController@update')->name('subcategories.update');
    Route::delete('subcategorias/{subcategory}', 'SubcategoryController@destroy')->name('subcategories.destroy');

    //Presentations
    Route::get('presentaciones/{presentation}/editar', 'PresentationController@edit')->name('presentations.edit');
    Route::post('presentaciones', 'PresentationController@store')->name('presentations.store');
    Route::put('presentaciones/{presentation}', 'PresentationController@update')->name('presentations.update');
    Route::delete('presentaciones/{presentation}', 'PresentationController@destroy')->name('presentations.destroy');

    //Types
    Route::get('tipos', 'TypeController@index')->name('types');
    Route::get('tipos/crear', 'TypeController@create')->name('types.create');
    Route::get('tipos/{type}', 'TypeController@show')->name('types.show');
    Route::get('tipos/{type}/editar', 'TypeController@edit')->name('types.edit');
    Route::post('tipos', 'TypeController@store')->name('types.store');
    Route::put('tipos/{type}', 'TypeController@update')->name('types.update');
    Route::delete('tipos/{type}', 'TypeController@destroy')->name('types.destroy');

    //Toasts
    Route::get('tostados', 'ToastController@index')->name('toasts');
    Route::get('tostados/crear', 'ToastController@create')->name('toasts.create');
    Route::get('tostados/{toast}', 'ToastController@show')->name('toasts.show');
    Route::get('tostados/{toast}/editar', 'ToastController@edit')->name('toasts.edit');
    Route::post('tostados', 'ToastController@store')->name('toasts.store');
    Route::put('tostados/{toast}', 'ToastController@update')->name('toasts.update');
    Route::delete('tostados/{toast}', 'ToastController@destroy')->name('toasts.destroy');

    //Products
    Route::get('productos', 'ProductController@index')->name('products');
    Route::get('productos/crear', 'ProductController@create')->name('products.create');
    Route::get('productos/{product}', 'ProductController@show')->name('products.show');
    Route::get('productos/{product}/editar', 'ProductController@edit')->name('products.edit');
    Route::post('productos', 'ProductController@store')->name('products.store');
    Route::post('productos/{product}/images', 'ImageController@storeProduct')->name('products.store.images');
    Route::put('productos/{product}', 'ProductController@update')->name('products.update');
    Route::delete('productos/{product}', 'ProductController@destroy')->name('products.destroy');

    //Grounds
    Route::get('molidos', 'GroundController@index')->name('grounds');
    Route::get('molidos/crear', 'GroundController@create')->name('grounds.create');
    Route::get('molidos/{ground}', 'GroundController@show')->name('grounds.show');
    Route::get('molidos/{ground}/editar', 'GroundController@edit')->name('grounds.edit');
    Route::post('molidos', 'GroundController@store')->name('grounds.store');
    Route::put('molidos/{ground}', 'GroundController@update')->name('grounds.update');
    Route::delete('molidos/{ground}', 'GroundController@destroy')->name('grounds.destroy');

    //CoffeeCategory
    Route::get('categoriasCafe', 'CoffeeCategoryController@index')->name('coffeeCategories');
    Route::get('categoriasCafe/crear', 'CoffeeCategoryController@create')->name('coffeeCategories.create');
    Route::get('categoriasCafe/{coffeeCategory}', 'CoffeeCategoryController@show')->name('coffeeCategories.show');
    Route::get('categoriasCafe/{coffeeCategory}/editar', 'CoffeeCategoryController@edit')->name('coffeeCategories.edit');
    Route::post('categoriasCafe', 'CoffeeCategoryController@store')->name('coffeeCategories.store');
    Route::put('categoriasCafe/{coffeeCategory}', 'CoffeeCategoryController@update')->name('coffeeCategories.update');
    Route::delete('categoriasCafe/{coffeeCategory}', 'CoffeeCategoryController@destroy')->name('coffeeCategories.destroy');

    //Category
    Route::get('categorias', 'CategoryController@index')->name('categories');
    Route::get('categorias/crear', 'CategoryController@create')->name('categories.create');
    Route::get('categorias/{category}', 'CategoryController@show')->name('categories.show');
    Route::get('categorias/{category}/editar', 'CategoryController@edit')->name('categories.edit');
    Route::post('categorias', 'CategoryController@store')->name('categories.store');
    Route::put('categorias/{category}', 'CategoryController@update')->name('categories.update');
    Route::delete('categorias/{category}', 'CategoryController@destroy')->name('categories.destroy');
    Route::get('/categorias/{category}/subcategorias', 'SubcategoryController@options')->name('categories.subcategories');

    //Coffee
    Route::get('cafes', 'CoffeeController@index')->name('coffees');
    Route::get('cafes/crear', 'CoffeeController@create')->name('coffees.create');
    Route::get('cafes/{coffee}', 'CoffeeController@show')->name('coffees.show');
    Route::get('cafes/{coffee}/editar', 'CoffeeController@edit')->name('coffees.edit');
    Route::post('cafes', 'CoffeeController@store')->name('coffees.store');
    Route::post('cafes/{coffee}/images', 'ImageController@storeCoffee')->name('coffees.store.images');
    Route::put('cafes/{coffee}', 'CoffeeController@update')->name('coffees.update');
    Route::delete('cafes/{coffee}', 'CoffeeController@destroy')->name('coffees.destroy');

    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');

    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');
});


Route::get('/', 'HomeController@index')->name('home');
Route::post('/message', 'HomeController@sendMessage')->name('message');
Route::get('/cafes', 'HomeController@cindex')->name('coffees');
Route::get('/cafes/{coffee}', 'HomeController@cshow')->name('coffees.show');
Route::get('/productos', 'HomeController@pindex')->name('products');
Route::get('/productos/{product}', 'HomeController@pshow')->name('products.show');
Route::get('/filter/coffees', 'HomeController@filterCoffees')->name('coffees.filter');
Route::get('/filter/products', 'HomeController@filterProducts')->name('product.filter');
Route::get('/categorias/{category}/subcategorias', 'Admin\SubcategoryController@options')->name('categories.subcategories');


Route::get('/usuario/carrito', 'CartController@cart')->name('cart');
Route::get('/usuario/carrito/ordenar', 'CartController@makeOrder')->name('order');
Route::get('/usuario/cafes/{presentation}', 'CartController@addPresentation')->name('store.coffee.cart');
Route::get('/usuario/productos/{product}', 'CartController@addProduct')->name('store.product.cart');
Route::delete('/usuario/cafes/{presentation}', 'CartController@destroyPresentation')->name('destroy.coffee.cart');
Route::delete('/usuario/productos/{product}', 'CartController@destroyProduct')->name('destroy.product.cart');

Route::group(['middleware' => ['web']], function () {
    Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
});

/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});
