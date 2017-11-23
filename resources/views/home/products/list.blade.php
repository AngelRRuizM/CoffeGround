@if(sizeof($products) > 0)
    @foreach($products as $product)
        <div class="col-md-6"> 
            <a href="{{ route('products.show', ['product' => $product->id]) }}">
                <div class="dish">
                    <div class="profile">
                        @if(sizeof($product->images) > 0)
                            <img src="{!! asset('storage/'.$product->images->first()->path) !!}" class="img-responsive" alt="product image">
                        @else
                            <img src="{!! asset('assets/home/img/no_photo.jpg') !!}" class="img-responsive" alt="no photo">
                        @endif
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