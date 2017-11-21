@extends('home.layouts.master')

@section('content')
<!-- Dishes Section -->
<section id="dishes" class="dishes">
    <div class="container text-center">
        <header>
            <h2>Catálogo de café</h2>
            <h3>Todo nuestro repertorio de café producido en México</h3>
        </header>
        <!-- Set up your HTML -->
        <!-- sidebar -->

        <div class="col-md-3">
            <div class="form-holder">
                <header>
                    <h3>Filtros</h3>
                </header>

                <form method="get" action="#" id="contact-form">
                    <div class="row">
                        <label for="user-name" class="col-sm-12 unique">Categoria</label>
                        <select class="col-sm-12" name="coffee_category" id="coffee_category" required>
                            <option  value="0" selected>Todas</option>
                            @foreach($coffeeCategories as $coffeeCategory)
                                @if(true)
                                    <option value="{{$coffeeCategory->id}}">{{ $coffeeCategory->name_es}}</option>
                                @else
                                    <option value="{{$coffeeCategory->id}}">{{ $coffeeCategory->name_en}}</option>
                                @endif
                            @endforeach
                        </select>
                        
                        <label for="user-name" class="col-sm-12 unique">Tipo</label>
                        <select class="col-sm-12" name="type" id="type" required>
                            <option value="0" selected>Todos</option>
                            @foreach($types as $type)
                                @if(true)
                                    <option value="{{$type->id}}">{{ $type->name_es}}</option>
                                @else
                                    <option value="{{$type->id}}">{{ $type->name_en}}</option>
                                @endif
                            @endforeach
                        </select>

                        <label for="user-name" class="col-sm-12 unique">Tostado</label>
                        <select class="col-sm-12" name="toats" id="toats" required>
                            <option value="0" selected>Todos</option>
                            @foreach($toasts as $toats)
                                @if(true)
                                    <option value="{{$toats->id}}">{{ $toats->name_es}}</option>
                                @else
                                    <option value="{{$toats->id}}">{{ $toats->name_en}}</option>
                                @endif
                            @endforeach
                        </select>
                        
                        <div class="col-sm-12">
                            <button type="submit" class="btn-unique btn-xs" id="submit">Filtrar</button>
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
                                @if(true)
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