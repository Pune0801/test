    <div class="container">
        <h1>Reporte de Productos con Stock Mínimo</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Depósito</th>
                    <th>Stock Mínimo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->nombreDeposito }}</td>
                        <td>{{ $producto->stock_minimo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
