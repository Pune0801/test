<!DOCTYPE html>
<html>

<head>
    <title>Crear Producto</title>
</head>

<body>
    <h1>Crear Producto</h1>
    @if ($errors->any())
        <div>
            <strong>Por favor corrige los siguientes errores:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
        </div>
        <div>
            <label for="moneda">Moneda:</label>
            <input type="text" name="moneda" id="moneda" value="{{ old('moneda') }}">
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" value="{{ old('precio') }}">
        </div>
        <div>
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen">
        </div>
        <div>
            <label for="stock_deposito1">Stock en Depósito 1:</label>
            <input type="number" name="stock_deposito1" id="stock_deposito1" value="{{ old('stock_deposito1') }}">
        </div>
        <div>
            <label for="stock_deposito2">Stock en Depósito 2:</label>
            <input type="number" name="stock_deposito2" id="stock_deposito2" value="{{ old('stock_deposito2') }}">
        </div>
        <button type="submit">Crear</button>
    </form>
</body>

</html>
