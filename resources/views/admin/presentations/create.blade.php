<form  method="POST" action="{{ route('admin.presentations.store') }}" class="form-horizontal form-label-left">
<div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-2">
    @include('admin.layouts.errors')
</div>
{{ csrf_field() }}
{{ method_field('POST') }}
<input type="hidden" id="coffee_id" name="coffee_id" class="form-control col-md-7 col-xs-12" value="{{$coffee->id}}">


<div class="col-md-6 col-sm-6 col-xs-12 form-group">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Peso<span class="required">*</span></label>
        <div class="col-md-9 col-sm-6 col-xs-12">
            <input type="text" id="weight" name="weight" class="form-control col-md-7 col-xs-12" required>
        </div>
    </div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ground">Molido</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <select class="form-control" id="ground" name="ground_id">
                @foreach($grounds as $ground)
                    <option value="{{$ground->id}}">{{$ground->name_es}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Precio</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="number" step=".1"  min="0" max="999999.99" id="price" name="price" class="form-control col-md-7 col-xs-12" required>
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