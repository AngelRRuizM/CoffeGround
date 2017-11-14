@extends('admin.layouts.admin')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Editar presentacón de café</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <form method="POST" action="{{ route('admin.presentations.update', ['presentation' => $presentation->id]) }}" class="form-horizontal form-label-left">
                <div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-2">
                    @include('admin.layouts.errors')
                </div>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" id="coffee_id" name="coffee_id" class="form-control col-md-7 col-xs-12" value="{{$presentation->coffee->id}}">

                
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Peso<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <input type="text" id="weight" name="weight" class="form-control col-md-7 col-xs-12" value="{{$presentation->weight}}" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ground">Molido</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" id="ground" name="ground_id">
                                @foreach($grounds as $ground)
                                    @if($ground->id == $presentation->ground->id)
                                        <option value="{{$ground->id}}" selected>{{$ground->name_es}}</option>    
                                    @else
                                        <option value="{{$ground->id}}">{{$ground->name_es}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Precio</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number" step=".1"  min="0" max="999999.99" id="price" name="price" class="form-control col-md-7 col-xs-12" value="{{$presentation->price}}" required>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{ route('admin.coffees.show', ['coffee' => $presentation->coffee->id]) }}"><button class="btn btn-primary" type="button">Cancelar</button></a>
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
