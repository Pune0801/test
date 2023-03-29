@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $producto->nombre }}</h1>
            <p>{{ $producto->descripcion }}</p>
            <p>Precio: {{ $producto->moneda }} {{ $producto->precio }}</p>
            <p>Disponible en los siguientes depósitos:</p>
            <ul>
                @foreach ($producto->depositos as $deposito)
                    <li>{{ $deposito->nombre }} - Stock disponible: {{ $deposito->pivot->disponible }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Imágenes del producto</div>
                <div class="card-body">
                    @foreach ($producto->imagenes as $imagen)
                        <img src="{{ Storage::url($imagen->path) }}" class="img-fluid mb-2">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
