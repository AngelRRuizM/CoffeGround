@extends('home.layouts.master')

@section('content')
<!-- Dishes Section -->
<section id="dishes" class="dishes">
    <div class="container text-center">
        <header>
            <h2>{{ __('store.products') }}</h2>
            <h3>{{ __('store.products.description') }}</h3>
        </header>
        <!-- Set up your HTML -->
        <!-- sidebar -->

        <div class="col-md-3">
            <div class="form-holder">
                <header>
                    <h3>{{ __('store.filter') }}</h3>
                </header>

                <form method="get" action="#" id="contact-form">
                    <div class="row">
                        <label for="user-name" class="col-sm-12 unique">{{ __('store.category') }}</label>
                        <select class="col-sm-12" name="category" id="category" required>
                            <option  value="0" selected>{{ __('store.all') }}</option>
                            @foreach($categories as $category)
                                @if($lan)
                                    <option value="{{$category->id}}">{{ $category->name_es}}</option>
                                @else
                                    <option value="{{$category->id}}">{{ $category->name_en}}</option>
                                @endif
                            @endforeach
                        </select>
                        
                        <label for="user-name" class="col-sm-12 unique">{{ __('store.type') }}</label>
                        <select class="col-sm-12" name="subcategory" id="subcategory" required>
                            <option value="0" selected>{{ __('store.all') }}</option>
                            @foreach($subcategories as $subcategory)
                                @if($lan)
                                    <option value="{{$subcategory->id}}">{{ $subcategory->name_es}}</option>
                                @else
                                    <option value="{{$subcategory->id}}">{{ $subcategory->name_en}}</option>
                                @endif
                            @endforeach
                        </select>
                        
                        <div class="col-sm-12">
                            <button type="submit" class="btn-unique btn-xs" id="submit">{{ __('store.filter') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-9">
            @foreach($products as $product)
                <div class="col-md-6"> 
                    <a href="{{ route('products.show', ['product' => $product->id]) }}">
                        <div class="dish">
                            <div class="profile">
                                <img src="assets/home/img/dish-c.png" class="img-responsive" alt="dish name">
                            </div>
                            <div class="text">
                                @if($lan)
                                    <h4>{{$product->name_es}}</h4>
                                    <p>{{$product->description_es}}</p>    
                                @else
                                    <h4>{{$product->name_en}}</h4>
                                    <p>{{$product->description_en}}</p>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>

    </div>
</section>
<!-- End Dishes Section -->
@endsection