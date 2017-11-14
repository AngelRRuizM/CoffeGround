@extends('admin.layouts.admin')

@section('content')
    <!-- page content -->
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Lista de categorias</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="{{ route('admin.categories.create') }}"><button type="button" class="btn btn-success">Crear categoria</button></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @include('admin.layouts.message')
            
            <table class="table table-striped" id="categories-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row"> {{$category->name_es}} </th>
                            <td> {{$category->description_es}} </td>
                            <td>
                                <a href="{{ route('admin.categories.show', ['category_id' => $category->id]) }}"><button type="button" class="btn btn-info">Detalles</button></a>
                                <a href="{{ route('admin.categories.edit', ['category_id' => $category->id]) }}"><button type="button" class="btn btn-primary">Editar</button></a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.categories.destroy', ['category_id' => $category->id   ]) }}" accept-charset="UTF-8">
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
            $('#categories-table').DataTable();
        } );
    </script>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
