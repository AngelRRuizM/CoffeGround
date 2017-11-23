@component('mail::message')
# Se ha realizado un nuevo pedido.

@component('mail::panel')
Información del usuario<br>
<table class="table">
    <tbody>
        <tr>
            <td>Identificador</td>
            <td>{{$user->id}}</td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$user->email}}</td>
        </tr>
    </tbody>
</table>
@endcomponent

@component('mail::panel')
Información de tu pedido<br>
<table class="table">
    <thead>
        <tr>
            <th>Nombre de producto</th>
            <th>Cantidad</th>
            <th>Importe</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cart->presentations as $presentation)
        <tr>
            <td>{{$presentation->coffee->name_es.' '.$presentation->weight}}</td>
            <td>{{$presentation->pivot->quantity}}</td>
            <td>${{$presentation->pivot->quantity * $presentation->price}}</td>
        </tr>
        @endforeach

        @foreach($cart->products as $product)
        <tr>
            <td>{{$product->name_es}}</td>
            <td>{{$product->pivot->quantity}}</td>
            <td>${{$product->pivot->quantity * $product->price}}</td>
        </tr>
        @endforeach
        
        <tr>
            <td></td>
            <td>total</td>
            <td>${{$cart->calculateTotal()}}</td>
        </tr> 
    </tbody>
</table>
@endcomponent

{{ config('app.name') }}
@endcomponent