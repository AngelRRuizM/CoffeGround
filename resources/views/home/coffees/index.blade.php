@extends('home.layouts.master')

@section('content')
<!-- Dishes Section -->
<section id="dishes" class="dishes">
    <div class="container text-center">
        <header>
            <h2>{{ __('store.coffeeCatalogue') }}</h2>
            <h3>{{ __('store.coffeeCatalogue.description') }}</h3>
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
                        <select class="col-sm-12" name="coffee_category" id="coffee_category" required>
                            <option  value="0" selected>{{ __('store.all') }}</option>
                            @foreach($coffeeCategories as $coffeeCategory)
                                @if($lan)
                                    <option value="{{$coffeeCategory->id}}">{{ $coffeeCategory->name_es}}</option>
                                @else
                                    <option value="{{$coffeeCategory->id}}">{{ $coffeeCategory->name_en}}</option>
                                @endif
                            @endforeach
                        </select>
                        
                        <label for="user-name" class="col-sm-12 unique">{{ __('store.type') }}</label>
                        <select class="col-sm-12" name="type" id="type" required>
                            <option value="0" selected>{{ __('store.all') }}</option>
                            @foreach($types as $type)
                                @if($lan)
                                    <option value="{{$type->id}}">{{ $type->name_es}}</option>
                                @else
                                    <option value="{{$type->id}}">{{ $type->name_en}}</option>
                                @endif
                            @endforeach
                        </select>

                        <label for="user-name" class="col-sm-12 unique">{{ __('store.toast') }}</label>
                        <select class="col-sm-12" name="toats" id="toats" required>
                            <option value="0" selected>{{ __('store.all') }}</option>
                            @foreach($toasts as $toats)
                                @if($lan)
                                    <option value="{{$toats->id}}">{{ $toats->name_es}}</option>
                                @else
                                    <option value="{{$toats->id}}">{{ $toats->name_en}}</option>
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
            @foreach($coffees as $coffee)
                <div class="col-md-6">
                    <a href="{{ route('coffees.show', ['coffee' => $coffee->id]) }}">
                        <div class="dish">
                            <div class="profile">
                                <img src="assets/home/img/dish-c.png" class="img-responsive" alt="dish name">
                            </div>
                            <div class="text">
                                @if($lan)
                                    <h4>{{$coffee->name_es}}</h4>
                                    <p>{{$coffee->description_es}}</p>    
                                @else
                                    <h4>{{$coffee->name_en}}</h4>
                                    <p>{{$coffee->description_en}}</p>
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