<!-- moadal booking form -->
<div class="reservation-overlay hidden-sm hidden-xs">
    <section id="reservation-modal" class="reservation-modal">
        <div id="close"><i class="icon-close"></i></div>

        <div class="container">
            <div class="row">
                <div class="form-holder col-md-12 text-center">
                    <h2>@yield('modal-title')</h2>
                    <h3>@yield('modal-subtitle')</h3>

                    @yield('modal-content')
                </div>
            </div>
        </div>
    </section>
</div>