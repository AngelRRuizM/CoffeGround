@extends('admin.layouts.admin')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Editar subcategoria</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <form method="POST" action="{{ route('admin.subcategories.update', ['subcategory' => $subcategory->id]) }}" class="form-horizontal form-label-left">
                <div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-2">
                    @include('admin.layouts.errors')
                </div>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" id="category_id" name="category_id" class="form-control col-md-7 col-xs-12" value="{{$subcategory->category->id}}">

            
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Nombre en español<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <input type="text" id="name_es" name="name_es" class="form-control col-md-7 col-xs-12" value="{{$subcategory->name_es}}" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Nombre en inglés<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <input type="text" id="name_en" name="name_en" class="form-control col-md-7 col-xs-12" value="{{$subcategory->name_en}}" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Descripcion en español<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <input type="text" id="description_es" name="description_es" class="form-control col-md-7 col-xs-12" value="{{$subcategory->description_es}}" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Descripcion en inglés<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <input type="text" id="description_en" name="description_en" class="form-control col-md-7 col-xs-12" value="{{$subcategory->description_en}}" required>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{ route('admin.categories.show', ['category' => $subcategory->category->id]) }}"><button class="btn btn-primary" type="button">Cancelar</button></a>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
