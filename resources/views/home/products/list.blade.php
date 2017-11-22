@if(sizeof($products) > 0)
    @foreach($products as $product)
        <div class="col-md-6"> 
            <a href="{{ route('products.show', ['product' => $product->id]) }}">
                <div class="dish">
                    <div class="profile">
                        <img src="assets/home/img/dish-c.png" class="img-responsive" alt="dish name">
                    </div>
                    <div class="text">
                        @if($lan)
                            <h4>{{$product->name_es}}</h4>
                            <p>{{$product->description_es}}</p>    
                        @else
                            <h4>{{$product->name_en}}</h4>
                            <p>{{$product->description_en}}</p>
                        @endif
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@else
    <p>No se han encontrado elementos que coincidan con esa búsqueda</p>
@endif