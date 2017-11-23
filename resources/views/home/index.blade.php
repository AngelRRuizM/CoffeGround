@extends('home.layouts.master')
 
@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero">
        <div id="slider" class="sl-slider-wrapper">

            <div class="sl-slider">
                <!-- slide -->
                <div class="sl-slide bg-1" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                    <div class="sl-slide-inner" style="background-image: url(assets/home/img/hero-bg.jpg);">
                        <div class="container">
                            <h2><span class="text-primary">{{ __('index') }}</span></h2>
                            <h1>{{ __('index.slogan') }}</h1>
                            <p>{{ __('index.slogan2') }}</p>
                        </div>
                    </div>
                </div>
                <!-- slide -->
                <div class="sl-slide bg-2" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                    <div class="sl-slide-inner" style="background-image: url(assets/home/img/hero-bg02.jpg);">
                        <div class="container">
                            <h1>{{ __('index.banner1.name') }}</h1>
                            <p>{{ __('index.banner1.desc') }}</p>
                        </div>
                    </div>
                </div>
                <!-- slide -->
                <div class="sl-slide bg-3" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                    <div class="sl-slide-inner" style="background-image: url(assets/home/img/hero-bg03.jpg);">
                        <div class="container">
                            <h1>{{ __('index.banner2.name') }}</h1>
                            <p>{{ __('index.banner2.desc') }}</p>
                        </div>
                    </div>
                </div>
            </div><!-- End sl-slider -->

            <!-- slider pagination -->
            <nav id="nav-dots" class="nav-dots">
                <span class="nav-dot-current"></span>
                <span></span>
                <span></span>
            </nav>

            <!-- scroll down btn -->
            <a id="scroll-down" href="#about" class="hidden-xs"></a>

            <!-- social icons menu -->
            <div class="social">
                <div class="wrapper">
                    <ul class="list-unstyled">
                        <li><a href="https://www.facebook.com/ImCoatiCoffee/" title="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" title="twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" title="instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <span>{{ __('index.follow.us') }}</span>
                </div>
            </div>
        </div><!-- End slider-wrapper -->
    </section><!-- End Hero Section -->


    <!-- About Section -->
    <section id="about" class="about">
        <div class="container text-center">
            <header>
                <h2>{{ __('index.about') }}</h2>
                <h3>{{ __('index.check') }}</h3>
            </header>
            <p class="lead">{{ __('about.description.i') }}</p>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Services Section -->
    <section id="services" class="services text-gray-lighter">
        <div class="container text-center">
            <header>
                <h2 class="white">{{ __('index.slogan') }}</h2>
                <h3 class="text-gray-light">{{ __('index.slogan2') }}</h3>
            </header>

            <div class="row">
                <!-- item -->
                <div class="col-sm-4 service">
                    <div class="icon">
                        <i class="fa fa-map" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h4 class="text-gray-light">{{ __('about.mision') }}</h4>
                        <p class="text-gray-lighter">{{ __('about.mision.i') }}</p>
                    </div>
                </div>

                <!-- item -->
                <div class="col-sm-4 service">
                    <div class="icon">
                        <i class="fa fa-binoculars" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h4 class="text-gray-light">{{ __('about.vision') }}</h4>
                        <p class="text-gray-lighter">{{ __('about.vision.i') }}</p>
                    </div>
                </div>

                <!-- item -->
                <div class="col-sm-4 service">
                    <div class="icon">
                        <i class="fa fa-list" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h4 class="text-gray-light">{{ __('about.values') }}</h4>
                        <p class="text-gray-lighter">{{ __('about.values.i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->

    <!-- End Booking Section -->
    <section id="contact" class="contact">
        <div id="map"></div>
        <div class="container text-center">
            <div class="form-holder">
                <header>
                    <h2>{{ __('index.contact') }}</h2>
                    <h3>{{ __('index.contact.desc') }}</h3>
                </header>

                <form method="POST" action="{{route('message')}}">
                    @if(count($errors))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Algo anda mal...</strong>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="row">
                        <label for="name" class="col-sm-6 unique">{{ __('index.name') }}
                            <input type="text" name="name" id="name" required>
                        </label>
                        <label for="email" class="col-sm-6 unique">{{ __('index.email') }}
                            <input type="email" name="email" id="email" required>
                        </label>
                        <label for="message" class="col-sm-12 unique">{{ __('index.message') }}
                            <textarea name="message" id="message" required></textarea>
                        </label>
                        <div class="col-sm-12">
                            <button type="submit" class="btn-unique" id="submit">{{ __('index.send') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End Booking Section -->


@endsection