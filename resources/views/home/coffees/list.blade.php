@if(sizeof($coffees) > 0)
    @foreach($coffees as $coffee)
        <div class="col-md-6">
            <a href="{{ route('coffees.show', ['coffee' => $coffee->id]) }}">
                <div class="dish">
                    <div class="profile">
                        @if(sizeof($coffee->images) > 0)
                            <img src="{!! asset('storage/'.$coffee->images->first()->path) !!}" class="img-responsive" alt="coffee image">
                        @else
                            <img src="{!! asset('assets/home/img/no_photo.jpg') !!}" class="img-responsive" alt="no photo">
                        @endif
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