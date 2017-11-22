@extends('home.layouts.master')

@section('content')
<!-- Events Section -->
<section id="events" class="events">
    <div class="container">
        <header class="text-center">
            @if($lan)
                <h2>{{$product->name_es}}</h2>
            @else
                <h2>{{$product->name_en}}</h2>
            @endif
        </header>

        <div class="row">
            <!-- Profile Side  -->
            <div class="col-sm-6">
                @if(sizeof($product->images) > 0)
                    @include('home.products.images')
                @else
                    <p>Imágenes no disponibles</p>
                @endif
            </div>

            <!-- Details Side  -->
            <div class="col-sm-6">
                <div class="details">
                    @if($lan)
                        <h4 class="text-primary">{{ __('store.category') }} | {{$product->subcategory->category->name_es}}</h4>
                        <h4 class="text-primary">{{ __('store.subcategory') }} | {{$product->subcategory->name_es}}</h4>
                        <p class="lead">{{$product->description_es}}</p>
                    @else
                        <h4 class="text-primary">{{ __('store.category') }} | {{$product->subcategory->category->name_en}}</h4>
                        <h4 class="text-primary">{{ __('store.subcategory') }} | {{$product->subcategory->name_en}}</h4>
                        <p class="lead">{{$product->description_en}}</p>
                    @endif

                     <a href="{{route('store.product.cart', ['product' => $product->id])}}" class="btn navbar-btn btn-unique btn-xs hidden-sm hidden-xs">{{__('store.add.cart') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Events Section -->
@endsection