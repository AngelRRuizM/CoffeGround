<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Presentaciones del café</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <h3>Crea una presentación</h3>
            @include('admin.presentations.create')
            
            <h3>Lista de presentaciones</h3>
            <table class="table table-striped" id="coffees-table">
                <thead>
                    <tr>
                        <th>Peso</th>
                        <th>Precio</th>
                        <th>Molido</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coffee->presentations as $presentation)
                        <tr>
                            <th scope="row"> {{$presentation->weight}}</th>
                            <td>{{$presentation->price}}</td>
                            <td>{{$presentation->ground->name_es}}</td>
                            <td>
                                <a href="{{ route('admin.presentations.edit', ['presentation_id' => $presentation->id]) }}"><button type="button" class="btn btn-primary">Editar</button></a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.presentations.destroy', ['presentation_id' => $presentation->id   ]) }}" accept-charset="UTF-8">
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