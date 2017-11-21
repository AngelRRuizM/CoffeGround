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

                <h2>{{ __('views.auth.login.header') }}</h2>

                {{ Form::open(['route' => 'login']) }}
                    <div class="row">
                        <div class="col-md-10 col-md-push-1">
                            <label for="email" class="col-sm-12 unique">{{ __('views.auth.login.input_0') }}
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            </label>

                            <label for="password" class="col-sm-12 unique">{{ __('views.auth.login.input_1') }}
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('email') }}" required autofocus>
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

                            <div>
                                <button class="btn btn-default submit" type="submit">{{ __('views.auth.login.action_0') }}</button>
                                <a class="reset_pass" href="{{ route('password.request') }}">
                                    {{ __('views.auth.login.action_1') }}
                                </a>
                            </div>

                            <div class="clearfix"></div>

                            @if(config('auth.users.registration'))
                                <div class="separator">
                                    <p class="change_link">{{ __('views.auth.login.message_1') }}
                                        <a href="{{ route('register') }}" class="to_register"> {{ __('views.auth.login.action_2') }} </a>
                                    </p>
                                    <div class="clearfix"></div>
                                    <br/>
                                </div>
                            @endif
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
<!-- End Booking Section -->
@endsection