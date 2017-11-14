<form  method="POST" action="{{ route('admin.subcategories.store') }}" class="form-horizontal form-label-left">
<div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-2">
    @include('admin.layouts.errors')
</div>
{{ csrf_field() }}
{{ method_field('POST') }}
<input type="hidden" id="category_id" name="category_id" class="form-control col-md-7 col-xs-12" value="{{$category->id}}">


<div class="col-md-6 col-sm-6 col-xs-12 form-group">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Nombre en español<span class="required">*</span></label>
        <div class="col-md-9 col-sm-6 col-xs-12">
            <input type="text" id="name_es" name="name_es" class="form-control col-md-7 col-xs-12" required>
        </div>
    </div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Nombre en inglés<span class="required">*</span></label>
        <div class="col-md-9 col-sm-6 col-xs-12">
            <input type="text" id="name_en" name="name_en" class="form-control col-md-7 col-xs-12" required>
        </div>
    </div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Descripción en español<span class="required">*</span></label>
        <div class="col-md-9 col-sm-6 col-xs-12">
            <input type="text" id="description_es" name="description_es" class="form-control col-md-7 col-xs-12" required>
        </div>
    </div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Descripción en inglés<span class="required">*</span></label>
        <div class="col-md-9 col-sm-6 col-xs-12">
            <input type="text" id="description_en" name="description_en" class="form-control col-md-7 col-xs-12" required>
        </div>
    </div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group">
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button class="btn btn-primary" type="reset">Reiniciar</button>
            <button type="submit" class="btn btn-success">Crear</button>
        </div>
    </div>
</div>
</form>