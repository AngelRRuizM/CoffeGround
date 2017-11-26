<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('admin.dashboard') }}" class="site_title">
                <span>Coffeeground</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        @if(auth()->user()->hasRole('administrator'))
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.users') }}"><i class="fa fa-users" aria-hidden="true"></i>Usuarios</a>
                    </li>
                </ul>
            </div>
        @endif

            <div class="menu_section">
                <h3>Café</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.coffees') }}"><i class="fa fa-coffee" aria-hidden="true"></i>Cafés</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.types') }}"><i class="fa fa-tag" aria-hidden="true"></i>Tipos de café</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.toasts') }}"><i class="fa fa-fire" aria-hidden="true"></i>Tostados</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.grounds') }}"><i class="fa fa-gavel" aria-hidden="true"></i>Molidos</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.coffeeCategories') }}"><i class="fa fa-list-ul" aria-hidden="true"></i>Categorías de café</a>
                    </li>
                </ul>
            </div>

            <div class="menu_section">
                <h3>Productos</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.products') }}"><i class="fa fa-gift" aria-hidden="true"></i>Productos</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories') }}"><i class="fa fa-filter" aria-hidden="true"></i>Categorías</a>
                    </li>
                </ul>
            </div>
            
            <!-- /sidebar menu 
            <div class="menu_section">
                <h3>{{ __('views.backend.section.navigation.sub_header_2') }}</h3>

                <ul class="nav side-menu">
                    <li>
                        <a>
                            <i class="fa fa-list"></i>{{ __('views.backend.section.navigation.menu_2_1') }}<span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ route('log-viewer::dashboard') }}">{{ __('views.backend.section.navigation.menu_2_2') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('log-viewer::logs.list') }}">{{ __('views.backend.section.navigation.menu_2_3') }}</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="{{ route('admin.permissions') }}"><i class="fa fa-key" aria-hidden="true"></i>{{ __('views.backend.section.navigation.menu_1_2') }}</a>
                    </li>
                </ul>
            </div>
            -->
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
