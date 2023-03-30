<?php

namespace App\Http\Controllers;

use App\Models\Deposito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepositoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //
        {
            $depositos = Deposito::with('productos')->get();

            return view('depositos.existencias', compact('depositos'));
        }
    }

    public function reporteDepositos()
    {
        $reporte = DB::select('SELECT d.nombre AS deposito, p.nombre AS producto, pd.disponibles AS stock FROM productos_depositos pd INNER JOIN productos p ON pd.idProducto = p.idProducto INNER JOIN depositos d ON pd.idDeposito = d.idDeposito ORDER BY d.nombre, p.nombre');

        return view('reporte-depositos', ['reporte' => $reporte]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Deposito $deposito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deposito $deposito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deposito $deposito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deposito $deposito)
    {
        //
    }
}
