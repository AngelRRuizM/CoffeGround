@if(sizeof($coffees) > 0)
    @foreach($coffees as $coffee)
        <div class="col-md-6">
            <a href="{{ route('coffees.show', ['coffee' => $coffee->id]) }}">
                <div class="dish">
                    <div class="profile">
                        <img src="assets/home/img/dish-c.png" class="img-responsive" alt="dish name">
                    </div>
                    <div class="text">
                        @if($lan)
                            <h4>{{$coffee->name_es}}</h4>
                            <p>{{$coffee->description_es}}</p>    
                        @else
                            <h4>{{$coffee->name_en}}</h4>
                            <p>{{$coffee->description_en}}</p>
                        @endif
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@else
    <p>No se han encontrado elementos que coincidan con esa búsqueda</p>
@endif