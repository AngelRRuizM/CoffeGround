<footer id="mainFooter" class="mainFooter">
    <div class="container">
        <div class="row">
            <div class="col-md-4 brief">
                <div class="header">
                    <img src="assets/home/img/logo-footer.png" alt="italiano" width="100">
                </div>
                <p>{{ __('footer.description') }}</p>
            </div>

            <div class="col-md-4 contact">
                <div class="header">
                    <h6>{{ __('footer.contact') }}</h6>
                </div>
                <ul class="contact list-unstyled">
                    <li><span class="icon-map text-primary"></span>{{ __('footer.address') }}</li>
                    <li><a href="mailto:Italiano@Company.com"><span class="icon-phone text-primary"></span>{{ __('footer.email') }}</a></li>
                    <li><span class="icon-mail text-primary"></span>{{ __('footer.phone') }}</li>
                    <li><span class="icon-printer text-primary"></span>{{ __('footer.cel') }}</li>
                </ul>
            </div>

            <div class="col-md-4 newsletter">
                <div class="header">
                    <h6>{{ __('footer.language') }}</h6>
                </div>
                <ul class="contact list-unstyled">
                        @foreach (Config::get('languages') as $lang => $language)
                            <li>
                                <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                            </li>
                        @endforeach
                    </ul>
                </ul>
            </div>
        </div>

        <ul class="social list-unstyled list-inline">
            <li><a href="https://www.facebook.com/ImCoatiCoffee/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#" target="_blank" title="Skype"><i class="fa fa-skype"></i></a></li>
        </ul>
    </div>

    <div class="copyrights">
        <div class="container">
            <div class="row">
                <div class="col-sm-10">
                    <p>&copy; {{ __('footer.footer') }}<a href="https://bootstraptemple.com/" target="_blank">BootstrapTemple.com</a>. Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></p>
                    <!-- Please do not remove the backlink to us unless you have purchased the attribution-free license at https://bootstraptemple.com. It is part of the license conditions. Thanks for understanding :) -->
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- scroll top btn -->
<div id="scrollTop" class="btn-unique">
    <i class="fa fa-angle-up"></i>
</div><!-- end scroll top btn -->