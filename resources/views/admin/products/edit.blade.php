@extends('admin.layouts.admin')

@section('content')
<!-- page content -->

<!-- Coffee fields form -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Editar producto - {{$product->name_es}}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form  method="POST" action="{{ route('admin.products.update', ['product' => $product->id]) }}" class="form-horizontal form-label-left">
                    <div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-2">
                        @include('admin.layouts.errors')
                    </div>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_es">Nombre en español<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name_es" name="name_es" class="form-control col-md-7 col-xs-12" required value="{{$product->name_es}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_en">Nombre en inglés<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name_en" name="name_en" class="form-control col-md-7 col-xs-12" required value="{{$product->name_en}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description_es">Descripción en español<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                          <textarea class="form-control" rows="3" id="descripton_es" name="description_es" required>{{$product->description_es}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description_en">Descripción en inglés<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                          <textarea class="form-control" rows="3" id="descripton_en" name="description_en" required>{{$product->description_en}}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Categoría</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="form-control" id="category" name="category_id">
                                @foreach($categories as $category)
                                    @if($product->subcategory->category->id == $category->id)
                                        <option value="{{$category->id}}" selected>{{$category->name_es}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name_es}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subcategory">Subcategoria</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="form-control" id="subcategory" name="subcategory_id">
                                @foreach($subcategories as $subcategory)
                                        @if($product->subcategory->id  == $subcategory->id)
                                            <option value="{{$subcategory->id}}" selected>{{$subcategory->name_es}}</option>
                                        @else
                                            <option value="{{$subcategory->id}}">{{$subcategory->name_es}}</option>
                                        @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{ route('admin.products') }}"><button class="btn btn-primary" type="button">Cancelar</button></a>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Images -->


<!-- Presentaciones -->


@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}

    <script>
        $(document).ready(function() {
            $("#category").change( function(){
                $.get( ("/admin/categorias/" + $("#category").val() + "/subcategorias" ),
                    function(data){
                        $("#subcategory").empty();
                        $("#subcategory").html(data);
                    }
                );
            });
        });
    </script>

@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection