@component('mail::message')
# Has recibido un nuevo mensaje.

@component('mail::panel')
Información del remitente<br>
<table class="table">
    <tbody>
        <tr>
            <td>Nombre</td>
            <td>{{$request->name}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$request->email}}</td>
        </tr>
    </tbody>
</table>
@endcomponent

@component('mail::panel')
Mensaje<br>
{{$request->message}}
@endcomponent

{{ config('app.name') }}
@endcomponent