    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Reporte de existencias por depósito</h1>


                @foreach ($depositos as $deposito)
                    <h2>{{ $deposito->nombre }}</h2>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Disponibles</th>
                                <th>Stock mínimo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deposito->productos as $producto)
                                <tr>
                                    <td>{{ $producto->idProducto }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->descripcion }}</td>
                                    <td>{{ $producto->pivot->disponibles }}</td>
                                    <td>{{ $producto->pivot->stock_minimo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    </div>

