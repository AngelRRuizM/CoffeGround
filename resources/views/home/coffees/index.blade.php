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

                <form id="filters">
                    <div class="row">
                        <label for="coffee_category" class="col-sm-12 unique">{{ __('store.category') }}</label>
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
                        
                        <label for="type" class="col-sm-12 unique">{{ __('store.type') }}</label>
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

                        <label for="toast" class="col-sm-12 unique">{{ __('store.toast') }}</label>
                        <select class="col-sm-12" name="toast" id="toast" required>
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
                            <button type="submit" id="submit" class="btn-unique btn-xs">{{ __('store.filter') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-9" id="coffees">
            @include('home.coffees.list')
        </div>

    </div>
</section>
<!-- End Dishes Section -->
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $("#filters").submit(function(e){
        console.log("/filter/coffees?" + $("#filters").serialize());
        $.get( ("/filter/coffees?" + $(this).serialize()),
            function(data){
                console.log("/filter?" + $("#filters").serialize());
                console.log(data);
                $('#coffees').empty();
                $('#coffees').html(data);
            }
        );
        e.preventDefault();
    });
})  ;
</script>
@endsection