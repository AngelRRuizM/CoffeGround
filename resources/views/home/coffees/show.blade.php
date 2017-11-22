@extends('home.layouts.master')

@section('content')
<!-- Events Section -->
<section id="events" class="events">
    <div class="container">
        <header class="text-center">
            @if($lan)
                <h2>{{$coffee->name_es}}</h2>
            @else
                <h2>{{$coffee->name_en}}</h2>
            @endif
        </header>

        <div class="row">
            <!-- Profile Side  -->
            <div class="col-sm-6">
                @if(sizeof($coffee->images) > 0)
                    @include('home.coffees.images')
                @else
                    <p>Imágenes no disponibles</p>
                @endif
            </div>

            <!-- Details Side  -->
            <div class="col-sm-6">
                <div class="details">
                    @if($lan)
                        <h4 class="text-primary">{{ __('store.category') }} | {{$coffee->coffeeCategory->name_es}}</h4>
                        <h4 class="text-primary">{{ __('store.toast') }} | {{$coffee->toast->name_es}}</h4>
                        <h4 class="text-primary">{{ __('store.type') }} | {{$coffee->type->name_es}}</h4>
                        <p class="lead">{{$coffee->description_es}}</p>
                    @else
                         <h4 class="text-primary">{{ __('store.category') }} | {{$coffee->coffeeCategory->name_en}}</h4>
                        <h4 class="text-primary">{{ __('store.toast') }} | {{$coffee->toast->name_en}}</h4>
                        <h4 class="text-primary">{{ __('store.type') }} | {{$coffee->type->name_en}}</h4>
                        <p class="lead">{{$coffee->description_en}}</p>
                    @endif

                    @if(sizeof($coffee->presentations) > 0)
                        @include('home.coffees.presentations')
                    @else
                        <h4>El café no se encuentra disponible en estos momentos</h4>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Events Section -->
@endsection