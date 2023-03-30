<!DOCTYPE html>
<html>
<head>
    <title>Reporte de existencias por depósito</title>
</head>
<body>
    <h1>Reporte de existencias por depósito</h1>

    <table>
        <thead>
            <tr>
                <th>Depósito</th>
                <th>Producto</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reporte as $fila)
                <tr>
                    <td>{{ $fila->deposito }}</td>
                    <td>{{ $fila->producto }}</td>
                    <td>{{ $fila->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
