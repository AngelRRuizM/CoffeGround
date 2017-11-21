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
                    <li class="active"><a href="/">Inicio</a></li>
                    <li><a href="/#about">Sobre nosotros</a></li>
                    <li><a href="/#contact">Contacto</a></li>
                    <li><a href="{{ route('coffees') }}">Catálogo de cafés</a></li>
                    <li><a href="{{ route('products') }}">Productos</a></li>
                </ul>
                @if(!Auth::check())
                    <a href="{{ route('login') }}" class="btn navbar-btn btn-unique hidden-sm hidden-xs">Inicia sesión</a>
                    <a href="{{ route('register') }}" class="btn navbar-btn btn-unique hidden-sm hidden-xs">Registrarse</a>
                @else
                    <a href="{{ route('cart') }}" class="btn navbar-btn btn-unique hidden-sm hidden-xs">Ir a carrito</a>
                    <a href="{{ route('logout') }}" class="btn navbar-btn btn-unique hidden-sm hidden-xs">Cerrar sesión</a>
                @endif
            </div>
        </div>
    </nav>
</header><!-- End Navbar -->