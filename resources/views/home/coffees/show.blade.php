@extends('home.layouts.master')

@section('content')
<!-- Events Section -->
<section id="events" class="events">
    <div class="container">
        <header class="text-center">
            @if(true)
                <h2>{{$coffee->name_es}}</h2>
            @else
                <h2>{{$coffee->name_en}}</h2>
            @endif
        </header>

        <div class="row">
            <!-- Profile Side  -->
            <div class="col-sm-6">
                <div class="profile has-border" style="background-image: url({!! asset('storage/'.$coffee->images->first()->path) !!});"></div>
                <!-- Gallery Section -->
                <section id="gallery" class="gallery">
                    <div class="gellery">
                        <div class="row">
                            @foreach($coffee->images as $image)
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
                    @if(true)
                        <h4 class="text-primary">Categoria | {{$coffee->coffeeCategory->name_es}}</h4>
                        <h4 class="text-primary">Tostado | {{$coffee->toast->name_es}}</h4>
                        <h4 class="text-primary">Tipo | {{$coffee->type->name_es}}</h4>
                        <p class="lead">{{$coffee->description_es}}</p>
                    @else
                         <h4 class="text-primary">Categoria | {{$coffee->coffeeCategory->name_en}}</h4>
                        <h4 class="text-primary">Tostado | {{$coffee->toast->name_en}}</h4>
                        <h4 class="text-primary">Tipo | {{$coffee->type->name_en}}</h4>
                        <p class="lead">{{$coffee->description_en}}</p>
                    @endif

                    <!-- Presentations Section -->
                    <section id="menu" class="menu">
                        <div class="menu">
                            <!-- Tabs Navigatin -->
                            <ul class="nav nav-tabs text-center has-border" role="tablist">
                                <li role="presentation" class="active"><a href="#presentations" aria-controls="breakfast" role="tab" data-toggle="tab">Presentaciones del café</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <!-- Presentations Panel -->
                                <div role="tabpanel" class="tab-pane active" id="presentations">
                                    <div class="row">
                                        <!-- item -->
                                        <div class="col-sm-12">
                                            @foreach($coffee->presentations as $presentation)
                                            <div class="menu-item has-border clearfix">
                                                <div class="item-details pull-left">
                                                    <p>Contenido: {{$presentation->weight}}</p>
                                                    @if(true)
                                                        <p>Molido: {{$presentation->ground->name_es}}</p>    
                                                    @else
                                                        <p>Molido: {{$presentation->ground->name_en}}</p>
                                                    @endif
                                                </div>
                                                <div class="item-price pull-right">
                                                    <strong class="text-large text-primary">${{$presentation->price}}</strong>
                                                    <a href="#" class="btn navbar-btn btn-unique btn-xs hidden-sm hidden-xs">Agregar a carrito</a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div><!-- End Presentations Panel-->

                            </div>
                        </div>
                    </section>
                    <!-- End Presentations Section -->
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Events Section -->
@endsection