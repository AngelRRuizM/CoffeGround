@extends('admin.layouts.admin')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Tipo de molido - {{$ground->name_es}}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <li><a class="close-link"><i class="fa fa-close"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @include('admin.layouts.message')
            <div class="row">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Nombre en español</th>
                            <td> {{$ground->name_es}} </td>
                        </tr>
                        <tr>
                            <th scope="row">Nombre en inglés</th>
                            <td> {{$ground->name_en}} </td>
                        </tr>
                        <tr>
                            <th scope="row">Descripción en español</th>
                            <td> {{$ground->description_es}} </td>
                        </tr>
                        <tr>
                            <th scope="row">Descripción en inglés</th>
                            <td> {{$ground->description_en}} </td>
                        </tr>    
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <a href="{{ route('admin.grounds.edit', ['ground' => $ground->id]) }}"><button type="button" class="btn btn-primary">Editar</button></a>
                </div>
                <div class="col-md-1">
                    <form method="POST" action="{{ route('admin.grounds.destroy', ['ground' => $ground->id   ]) }}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger" type="submit" value="Eliminar">
                    </form>
                </div>
            </div>
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
