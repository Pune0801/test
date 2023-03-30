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
            <label for="codigo">Código:</label>
            <input type="text" name="codigo" id="codigo" value="{{ old('codigo') }}">
        </div>
        <div>
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->idCategoria }}"
                        {{ old('categoria') === $categoria->idCategoria ? 'selected' : '' }}>{{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
        </div>
        <div>
            <label for="moneda">Moneda:</label>
            <select id="moneda" name="moneda">
                <option value="ARS">ARS</option>
            </select>
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" value="{{ old('precio') }}">
        </div>
        <div>
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen">
        </div>
        @foreach ($depositos as $deposito)
            <div>
                <label for="stock_disponible_{{ $deposito->idDeposito }}">Stock disponible en
                    ({{ $deposito->nombre }}):</label>
                <input type="number" name="stock_disponible[{{ $deposito->idDeposito }}]"
                    id="stock_disponible_{{ $deposito->idDeposito }}"
                    value="{{ old("stock_disponible[$deposito->idDeposito]") }}">
            </div>
            <div>
                <label for="stock_minimo_{{ $deposito->idDeposito }}">Stock minimo en
                    ({{ $deposito->nombre }}):</label>
                <input type="number" name="stock_minimo[{{ $deposito->idDeposito }}]"
                    id="stock_minimo_{{ $deposito->idDeposito }}"
                    value="{{ old("stock_minimo[$deposito->idDeposito]") }}">
            </div>
        @endforeach
        <button type="submit">Crear</button>
    </form>
</body>

</html>
