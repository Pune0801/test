<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Listado de productos</h1>
            <a href="{{ route('productos.create') }}" class="btn btn-success">Agregar producto</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>#{{ $producto->idProducto }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->codigo ?: '-' }}</td>
                        <td>{{ $producto->categoria->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->moneda }} {{ $producto->precio }}</td>
                        <td>
                            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>

