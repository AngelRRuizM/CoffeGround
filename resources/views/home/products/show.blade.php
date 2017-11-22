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
                <div class="profile has-border" style="background-image: url({!! asset('storage/'.$product->images->first()->path) !!});"></div>
                <!-- Gallery Section -->
                <section id="gallery" class="gallery">
                    <div class="gellery">
                        <div class="row">
                            @foreach($product->images as $image)
                                <!-- Item -->
                                <div class="col-md-6 col-sm-6 col-xs-6 col-xs-6 col-custom-12">
                                    <div class="item">
                                        <img src="{!! asset('storage/'.$image->path) !!}" alt="image">
                                        <a href="{!! asset('storage/'.$image->path) !!}" data-lightbox="image-1" data-title="Image Caption" class="has-border">
                                            <span class="icon-search"></span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <!-- End Gallery Section -->
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