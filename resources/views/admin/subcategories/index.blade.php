<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Subcategorías</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!--<li><a class="close-link"><i class="fa fa-close"></i></a></li>-->
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <h3>Crea una subcategoría</h3>
            @include('admin.subcategories.create')
            
            <h3>Lista de Subcategorías</h3>
            <table class="table table-striped" id="coffees-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category->subcategories as $subcategory)
                        <tr>
                            <th scope="row"> {{$subcategory->name_es}}</th>
                            <td>{{$subcategory->description_es}}</td>
                            <td>
                                <a href="{{ route('admin.subcategories.edit', ['subcategory_id' => $subcategory->id]) }}"><button type="button" class="btn btn-primary">Editar</button></a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.subcategories.destroy', ['subcategory_id' => $subcategory->id   ]) }}" accept-charset="UTF-8">
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