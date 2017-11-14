@extends('admin.layouts.admin')

@section('content')
    <!-- page content -->
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Lista de tostados</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="{{ route('admin.toasts.create') }}"><button type="button" class="btn btn-success">Crear nuevo tostado</button></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @include('admin.layouts.message')
            
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($toasts as $toast)
                        <tr>
                            <th scope="row"> {{$toast->name_es}} </th>
                            <td> {{$toast->description_es}} </td>
                            <td>
                                <a href="{{ route('admin.toasts.show', ['toast_id' => $toast->id]) }}"><button type="button" class="btn btn-info">Detalles</button></a>
                            </td>
                            <td>
                                <a href="{{ route('admin.toasts.edit', ['toast_id' => $toast->id]) }}"><button type="button" class="btn btn-primary">Editar</button></a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.toasts.destroy', ['toast_id' => $toast->id   ]) }}" accept-charset="UTF-8">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" value="Eliminar">
                                </form>
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>

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
