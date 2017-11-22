<div class="profile has-border" style="background-image: url({!! asset('storage/'.$coffee->images->first()->path) !!});"></div>
<!-- Gallery Section -->
<section id="gallery" class="gallery">
    <div class="gellery">
        <div class="row">
            @foreach($coffee->images as $image)
                <!-- Item -->
                <div class="col-md-6 col-sm-6 col-xs-6 col-xs-6 col-custom-12">
                    <div class="item">
                        <img src="{!! asset('storage/'.$image->path) !!}" alt="image">
                        <a href="{!! asset('storage/'.$image->path) !!}" data-lightbox="image-1" data-title="Image Caption" class="has-border">
                            <span class="icon-search"></span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Gallery Section -->