@extends('admin.layouts.admin')

@section('content')
    <!-- page content -->
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Lista de cafés</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="{{ route('admin.coffees.create') }}"><button type="button" class="btn btn-success">Crear café</button></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @include('admin.layouts.message')
            
            <table class="table table-striped" id="coffees-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Tipo</th>
                        <th>Tostado</th>
                        <th>Categoria</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coffees as $coffee)
                        <tr>
                            <th scope="row"> {{$coffee->name_es}} </th>
                            <td> {{$coffee->description_es}} </td>
                            <td> {{$coffee->type->name_es}} </td>
                            <td> {{$coffee->toast->name_es}} </td>
                            <td> {{$coffee->coffeeCategory->name_es}} </td>
                            <td>
                                <a href="{{ route('admin.coffees.show', ['coffee_id' => $coffee->id]) }}"><button type="button" class="btn btn-info">Detalles</button></a>
                                <a href="{{ route('admin.coffees.edit', ['coffee_id' => $coffee->id]) }}"><button type="button" class="btn btn-primary">Editar</button></a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.coffees.destroy', ['coffee_id' => $coffee->id   ]) }}" accept-charset="UTF-8">
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

    <script>
        $(document).ready(function() {
            $('#coffees-table').DataTable();
        } );
    </script>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
