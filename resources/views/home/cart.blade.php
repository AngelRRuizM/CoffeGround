@extends('home.layouts.master')
 
@section('content')
<!-- Menu Section -->
<section id="cart" class="menu">
    <div class="container">
        <header class="text-center">
            <h2>{{ __('cart') }}</h2>
            <h3>{{ __('cart.description') }}</h3>
            @if(sizeof(Auth::user()->carts->first()->presentations) > 0 || sizeof(Auth::user()->carts->first()->products) > 0)
                <a href="{{ route('order') }}" class="btn navbar-btn btn-unique hidden-sm hidden-xs">Realizar pedido</a>
            @endif

            @if($flash = session('message'))
                <h3>{{$flash}}</h3>
            @endif
        </header>

        <div class="menu">
            <!-- Tabs Navigatin -->
            <ul class="nav nav-tabs text-center has-border" role="tablist">
                <li role="presentation" class="active"><a href="#coffees" aria-controls="coffees" role="tab" data-toggle="tab">{{ __('cart.coffeeproduct') }}</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Breakfast Panel -->
                <div role="tabpanel" class="tab-pane active" id="coffees">
                    <div class="row">
                        <!-- item -->
                        <div class="col-sm-6">
                            @if(sizeof(Auth::user()->carts->first()->presentations) > 0)
                                @foreach(Auth::user()->carts->first()->presentations as $presentation)
                                        <div class="menu-item recommended has-border clearfix">
                                        <div class="item-details pull-left">
                                            @if($lan)
                                                <h4> {{$presentation->coffee->name_es}}</h4>
                                                <p>{{ __('store.category') }} {{$presentation->coffee->coffeeCategory->name_es}}</p>
                                                <p>{{ __('store.type') }} {{$presentation->coffee->type->name_es}}</p>
                                                <p>{{ __('store.toast') }}: {{$presentation->coffee->toast->name_es}}</p>
                                                </br>
                                                <form method="POST" action="{{ route('destroy.coffee.cart', ['presentation' => $presentation->id]) }}" accept-charset="UTF-8">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <input class="btn btn-unique btn-xs hidden-sm hidden-xs" style="text-decoration: underline;" type="submit" value="Eliminar del carrito">
                                                </form>
                                            @else
                                                <h4> {{$presentation->coffee->name_en}}</h4>
                                                <p>{{ __('store.category') }} {{$presentation->coffee->coffeeCategory->name_en}}</p>
                                                <p>{{ __('store.type') }} {{$presentation->coffee->type->name_en}}</p>
                                                <p>{{ __('store.toast') }}: {{$presentation->coffee->toast->name_en}}</p>
                                                <form method="POST" action="{{ route('destroy.coffee.cart', ['presentation' => $presentation->id]) }}" accept-charset="UTF-8">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input class="btn btn-unique btn-xs hidden-sm hidden-xs" style="text-decoration: underline;" type="submit" value="Delete from cart">
                                                </form>
                                            @endif
                                        </div>
                                        <div class="item-price pull-right">
                                            <strong class="text-large text-primary">${{$presentation->price}}</strong>                                        
                                            @if($lan)
                                                <p>{{ __('store.content') }}: {{$presentation->weight}}</p>
                                                <p>{{ __('store.ground') }} {{$presentation->ground->name_es}}</p>
                                                <p>{{ __('cart.quantity') }} <input style="z-index:-1; color:black; width: 75px" type="number" step="1" min="1" max="15" name="presentation_{{$presentation->id}}" id="presentation_{{$presentation->id}}" value="{{$presentation->pivot->quantity}}" required></p>
                                            @else
                                                <p>{{ __('store.content') }}: {{$presentation->weight}}</p>
                                                <p>{{ __('store.ground') }} {{$presentation->ground->name_en}}</p>
                                                <p>{{ __('cart.quantity') }} <input style="z-index:-1; color:black; width: 75px" type="number" step="1" min="1" max="15" name="presentation_{{$presentation->id}}" id="presentation_{{$presentation->id}}" value="{{$presentation->pivot->quantity}}" required></p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>{{ __('cart.empty') }}</p>
                            @endif
                        </div>

                        <div class="col-sm-6">
                            @if(sizeof(Auth::user()->carts->first()->products) > 0)
                                @foreach(Auth::user()->carts->first()->products as $product)
                                        <div class="menu-item has-border clearfix">
                                        <div class="item-details pull-left">
                                            @if($lan)
                                                <h4> {{$product->name_es}}</h4>
                                                <p>{{ __('store.category') }} {{$product->subcategory->category->name_es}}</p>
                                                <p>{{ __('store.subcategory') }} {{$product->subcategory->name_es}}</p>
                                                </br>
                                                <form method="POST" action="{{ route('destroy.product.cart', ['product' => $product->id]) }}" accept-charset="UTF-8">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <input class="btn btn-unique btn-xs hidden-sm hidden-xs" style="text-decoration: underline;" type="submit" value="Eliminar del carrito">
                                                </form>
                                            @else
                                                <h4> {{$product->name_en}}</h4>
                                                <p>{{ __('store.category') }} {{$product->subcategory->category->name_en}}</p>
                                                <p>{{ __('store.category') }} {{$product->subcategory->name_en}}</p>
                                                </br>
                                                <form method="POST" action="{{ route('destroy.product.cart', ['product' => $product->id]) }}" accept-charset="UTF-8">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <input class="btn btn-unique btn-xs hidden-sm hidden-xs" style="text-decoration: underline;" type="submit" value="Delete from cart">
                                                </form>
                                            @endif
                                        </div>
                                        <div class="item-price pull-right">
                                            <strong class="text-large text-primary">${{$product->price}}</strong>                                        
                                            @if($lan)
                                                <p>{{ __('cart.quantity') }} <input style="z-index:-1; color:black; width: 75px" type="number" step="1" min="1" max="15" name="presentation_{{$presentation->id}}" id="presentation_{{$presentation->id}}" value="{{$product->pivot->quantity}}" required></p>
                                            @else
                                                <p>{{ __('cart.quantity') }} <input style="z-index:-1; color:black; width: 75px" type="number" step="1" min="1" max="15" name="presentation_{{$presentation->id}}" id="presentation_{{$presentation->id}}" value="{{$product->pivot->quantity}}" required></p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>{{ __('cart.empty') }}.</p>
                            @endif
                        </div>
                    </div>
                </div><!-- End Breakfast Panel-->
            </div>
        </div>
    </div>
</section>
<!-- End Menu Section -->
@endsection