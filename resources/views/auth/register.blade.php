@extends('home.layouts.master')

@section('content')
<!-- Booking Section -->
<section id="booking" class="booking">
    <div class="container text-center">
        <div class="row">
            <div class="form-holder col-md-10 col-md-push-1 text-center">
                <div class="ribbon">
                    <i class="fa fa-star"></i>
                </div>

                <h2>{{ __('views.auth.register.header') }}</h2>

                {{ Form::open(['route' => 'register']) }}
                    <div class="row">
                        <div class="col-md-10 col-md-push-1">
                            <label for="name" class="col-sm-12 unique">{{ __('views.auth.register.input_0') }}
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </label>
                            
                            <label for="email" class="col-sm-12 unique">{{ __('views.auth.register.input_1') }}
                                <input id="email" type="email" class="form-control" name="email" required autofocus>
                            </label>

                            <label for="password" class="col-sm-12 unique">{{ __('views.auth.register.input_2') }}
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('email') }}" required autofocus>
                            </label>

                            <label for="password_confirmation" class="col-sm-12 unique">{{ __('views.auth.register.input_3') }}
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" value="{{ old('email') }}" required autofocus>
                            </label>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if (!$errors->isEmpty())
                                <div class="alert alert-danger" role="alert">
                                    {!! $errors->first() !!}
                                </div>
                            @endif

                            @if(config('auth.captcha.registration'))
                                @captcha()
                            @endif

                            <div>
                                <button type="submit" class="btn btn-default submit">{{ __('views.auth.register.action_1') }}</button>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">{{ __('views.auth.register.message') }}
                                    <a href="{{ route('login') }}" class="to_register"> {{ __('views.auth.register.action_2') }} </a>
                                </p>

                                <div class="clearfix"></div>
                                <br/>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
<!-- End Booking Section -->
@endsection