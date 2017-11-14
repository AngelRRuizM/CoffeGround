@extends('admin.layouts.admin')

@section('content')
    <!-- page content -->
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Lista de cafés</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="{{ route('admin.products.create') }}"><button type="button" class="btn btn-success">Crear producto</button></a></li>
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
                        <th>Categoria</th>
                        <th>Subcategoria</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row"> {{$product->name_es}} </th>
                            <td> {{$product->description_es}} </td>
                            <td> {{$product->subcategory->category->name_es}} </td>
                            <td> {{$product->subcategory->name_es}} </td>
                            <td>
                                <a href="{{ route('admin.products.show', ['product_id' => $product->id]) }}"><button type="button" class="btn btn-info">Detalles</button></a>
                                <a href="{{ route('admin.products.edit', ['product_id' => $product->id]) }}"><button type="button" class="btn btn-primary">Editar</button></a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.products.destroy', ['product_id' => $product->id   ]) }}" accept-charset="UTF-8">
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
            $('#products-table').DataTable();
        } );
    </script>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
