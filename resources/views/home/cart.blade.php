@extends('home.layouts.master')

@section('content')
<!-- Menu Section -->
<section id="cart" class="menu">
    <div class="container">
        <header class="text-center">
            <h2>Tu carrito</h2>
            <h3>Aquí encontrarás todos los productos y café que has agregado.</h3>
        </header>

        <div class="menu">
            <!-- Tabs Navigatin -->
            <ul class="nav nav-tabs text-center has-border" role="tablist">
                <li role="presentation" class="active"><a href="#coffees" aria-controls="coffees" role="tab" data-toggle="tab">Cafés</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Breakfast Panel -->
                <div role="tabpanel" class="tab-pane active" id="coffees">
                    <div class="row">
                        <!-- item -->
                        <div class="col-sm-12">
                            @foreach(Auth::user()->carts->first()->presentations as $presentation)
                                    <div class="menu-item has-border clearfix">
                                    <div class="item-details pull-left">
                                        <p>Contenido: {{$presentation->weight}}</p>
                                        @if(true)
                                            <p>Molido: {{$presentation->ground->name_es}}</p>    
                                        @else
                                            <p>Molido: {{$presentation->ground->name_en}}</p>
                                        @endif
                                        <label for="user-name" class="col-sm-12 unique">Categoria</label>
                                        <select class="col-sm-12" name="coffee_{{$coffee->id}}" id="coffee_{{$coffee->id}}" required>
                                            <option9  value="0" selected>Todas</option>
                                            
                                                    <option value="{{$coffeeCategory->id}}">{{ $coffeeCategory->name_es}}</option>
                                        </select>

                                    </div>
                                    <div class="item-price pull-right">
                                        <strong class="text-large text-primary">${{$presentation->price}}</strong>
                                        <a href="#" class="btn navbar-btn btn-unique btn-xs hidden-sm hidden-xs">Agregar a carrito</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div><!-- End Breakfast Panel-->
            </div>
        </div>

        <div class="menu">
            <!-- Tabs Navigatin -->
            <ul class="nav nav-tabs text-center has-border" role="tablist">
                <li role="presentation" class="active"><a href="#products" aria-controls="products" role="tab" data-toggle="tab">Productos</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Breakfast Panel -->
                <div role="tabpanel" class="tab-pane active" id="products">
                    <div class="row">
                        <!-- item -->
                        <div class="col-sm-6">
                            @foreach(Auth::user()->carts->first()->products as $product)
                                <div class="menu-item has-border clearfix">
                                    <div class="item-details pull-left">
                                        <h5>Wild Mushroom Bucatini with Kale</h5>
                                        <p>Mushroom / Veggie / White Sources</p>
                                    </div>
                                    <div class="item-price pull-right">
                                        <strong class="text-large text-primary">20$</strong>
                                        <span class="text-medium">Recommended</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div><!-- End Breakfast Panel-->
            </div>
        </div>
    </div>
</section>
<!-- End Menu Section -->
@endsection