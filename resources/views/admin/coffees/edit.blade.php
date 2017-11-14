@extends('admin.layouts.admin')

@section('content')
<!-- page content -->

<!-- Coffee fields form -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Editar café - {{$coffee->name_es}}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form  method="POST" action="{{ route('admin.coffees.update', ['coffee' => $coffee->id]) }}" class="form-horizontal form-label-left">
                    <div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-2">
                        @include('admin.layouts.errors')
                    </div>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_es">Nombre en español<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name_es" name="name_es" class="form-control col-md-7 col-xs-12" required value="{{$coffee->name_es}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_en">Nombre en inglés<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name_en" name="name_en" class="form-control col-md-7 col-xs-12" required value="{{$coffee->name_en}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description_es">Descripción en español<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                          <textarea class="form-control" rows="3" id="descripton_es" name="description_es" required>{{$coffee->description_es}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description_en">Descripción en inglés<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                          <textarea class="form-control" rows="3" id="descripton_en" name="description_en" required>{{$coffee->description_en}}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coffeeCategory">Categoría</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="form-control" id="coffeeCategory" name="coffee_category_id">
                                @foreach($coffeeCategories as $coffeeCategory)
                                    @if($coffee->coffeeCategory->id == $coffeeCategory->id)
                                        <option value="{{$coffeeCategory->id}}" selected>{{$coffeeCategory->name_es}}</option>
                                    @else
                                        <option value="{{$coffeeCategory->id}}">{{$coffeeCategory->name_es}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Tipo</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="form-control" id="type" name="type_id">
                                @foreach($types as $type)
                                        @if($coffee->type->id  == $type->id)
                                            <option value="{{$type->id}}" selected>{{$type->name_es}}</option>
                                        @else
                                            <option value="{{$type->id}}">{{$type->name_es}}</option>
                                        @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="toast">Tostado</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="form-control" id="toast" name="toast_id">
                                @foreach($toasts as $toast)
                                    @if($coffee->type->id  == $type->id)
                                        <option value="{{$toast->id}}" selected>{{$toast->name_es}}</option>
                                    @else
                                        <option value="{{$toast->id}}">{{$toast->name_es}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{ route('admin.coffees') }}"><button class="btn btn-primary" type="button">Cancelar</button></a>
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
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection