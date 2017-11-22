<header class="header">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header"><a href="index.html" class="navbar-brand"><img src="/assets/home/img/logo.png" alt="Italiano" width="100"></a>
                <div class="navbar-buttons">
                    <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle navbar-btn">Menu<i class="fa fa-align-justify"></i></button>
                </div>
            </div>
            <div id="navigation" class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">{{ __('home') }}</a></li>
                    <li><a href="/#about">{{ __('home.about') }}</a></li>
                    <li><a href="/#contact">{{ __('home.contact') }}</a></li>
                    <li><a href="{{ route('coffees') }}">{{ __('home.coffee.store') }}</a></li>
                    <li><a href="{{ route('products') }}">{{ __('home.products') }}</a></li>
                </ul>
                @if(!Auth::check())
                    <a href="{{ route('login') }}" class="btn navbar-btn btn-unique hidden-sm hidden-xs">{{ __('views.auth.login.action_0') }}</a>
                    <a href="{{ route('register') }}" class="btn navbar-btn btn-unique hidden-sm hidden-xs">{{ __('views.auth.login.action_2') }}</a>
                @else
                    <a href="{{ route('cart') }}" class="btn navbar-btn btn-unique hidden-sm hidden-xs">{{ __('home.cart') }}</a>
                    <a href="{{ route('logout') }}" class="btn navbar-btn btn-unique hidden-sm hidden-xs">{{ __('views.welcome.logout') }}</a>
                @endif
            </div>
        </div>
    </nav>
</header><!-- End Navbar -->