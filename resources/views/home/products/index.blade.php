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

                <form id="filters">
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

        <div class="col-md-9" id="products">
            @include('home.products.list')
        </div>
    </div>
</section>
<!-- End Dishes Section -->
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $("#filters").submit(function(e){
        $.get( ("/filter/products?" + $(this).serialize()),
            function(data){
                $('#products').empty();
                $('#products').html(data);
            }
        );
        e.preventDefault();
    });

    $("#category").change( function(){
        $.get( ("/categorias/" + $("#category").val() + "/subcategorias" ),
            function(data){
                $("#subcategory").empty();
                $("#subcategory").html(data);
            }
        );
    });
});
</script>
@endsection