<!-- Presentations Section -->
<section id="menu" class="menu">
    <div class="menu">
        <!-- Tabs Navigatin -->
        <ul class="nav nav-tabs text-center has-border" role="tablist">
            <li role="presentation" class="active"><a href="#presentations" aria-controls="breakfast" role="tab" data-toggle="tab">{{ __('store.presentation') }}</a></li>
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
                                        <p>{{ __('store.content') }} {{$presentation->weight}}</p>
                                        @if($lan)
                                            <p>{{ __('store.ground') }} {{$presentation->ground->name_es}}</p>    
                                        @else
                                            <p>{{ __('store.ground') }} {{$presentation->ground->name_en}}</p>
                                        @endif
                                    </div>
                                    <div class="item-price pull-right">
                                        <strong class="text-large text-primary">${{$presentation->price}}</strong>
                                        <a href="{{route('store.coffee.cart', ['presentation' => $presentation->id])}}" class="btn navbar-btn btn-unique btn-xs hidden-sm hidden-xs">{{ __('store.add.cart') }}</a>
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