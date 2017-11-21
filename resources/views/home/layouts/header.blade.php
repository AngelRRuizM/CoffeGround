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
                <a href="#" class="btn navbar-btn btn-unique hidden-sm hidden-xs" id="open-reservation">Inicia sesión</a>
                <a href="#" class="btn navbar-btn btn-unique hidden-sm hidden-xs" id="open-reservation">Registrarse</a>
            </div>
        </div>
    </nav>
</header><!-- End Navbar -->