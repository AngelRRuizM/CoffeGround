<div class="col-xs-12" >
    <div class="x_panel">
        <div class="x_title">
            <h2>Imágenes del café</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <li><a class="close-link"><i class="fa fa-close"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                @include('admin.layouts.errors')
                <form enctype="multipart/form-data" class="form-horizontal form-label-left" method="POST" action="{{route('admin.coffees.store.images', ['coffee' => $coffee->id])}}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Imagen</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" accept="image/*" id="image" name="images[]" class="form-control col-md-7 col-xs-12" multiple="multiple" Required>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <button type="submit" class="btn btn-success">Agregar imagen(es)</button>
                        </div>
                    </div>
                </form>
                <br/>
            </div>

            <div class="row">
                @foreach($coffee->images as $image)
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="{!! asset('storage/'.$image->path) !!}" alt="image" />
                                <div class="mask no-caption">
                                    <div class="tools tools-bottom">
                                        <a href="{!! asset('storage/'.$image->path) !!}"><button type="button" class="btn btn-info"><i class="fa fa-arrows-alt"></i></button></a>
                                        <a href="{{ route('admin.images.destroy', ['image' => $image->id]) }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
            
    </div>
</div>