@component('mail::message')
# Tu pedido se realizó de forma exitosa.

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

Tu orden será procesada por nuestro equipo.<br>
En unos momentos recibirás un correo con la información de pago y más instrucciones para finalizar la tansacción.

Gracias,<br>
{{ config('app.name') }}
@endcomponent
