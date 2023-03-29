<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Deposito;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['imagenes', 'depositos'])->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $depositos = Deposito::all();
        return view('productos.create', compact('depositos'));
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->moneda = $request->moneda;
        $producto->precio = $request->precio;
        $producto->habilitado = true;
        $producto->save();

        foreach ($request->depositos as $deposito) {
            $producto->depositos()->attach($deposito['id'], [
                'disponible' => $deposito['disponible'],
                'stock_minimo' => $deposito['stock_minimo']
            ]);
        }

        if ($request->hasFile('imagenes')) {
            $imagenes = $request->file('imagenes');
            foreach ($imagenes as $imagen) {
                $path = $imagen->store('public/imagenes');
                $producto->imagenes()->create([
                    'path' => $path,
                    'por_defecto' => false
                ]);
            }
        }

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    public function edit($id)
    {
        $producto = Producto::with(['imagenes', 'depositos'])->find($id);
        $depositos = Deposito::all();
        return view('productos.edit', compact('producto', 'depositos'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->moneda = $request->moneda;
        $producto->precio = $request->precio;
        $producto->habilitado = $request->has('habilitado');
        $producto->save();

        $producto->depositos()->detach();

        foreach ($request->depositos as $deposito) {
            $producto->depositos()->attach($deposito['id'], [
                'disponible' => $deposito['disponible'],
                'stock_minimo' => $deposito['stock_minimo']
            ]);
        }

        if ($request->hasFile('imagenes')) {
            $imagenes = $request->file('imagenes');
            foreach ($imagenes as $imagen) {
                $path = $imagen->store('public/imagenes');
                $producto->imagenes()->create([
                    'path' => $path,
                    'por_defecto' => false
                ]);
            }
        }

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->depositos()->detach();
        $producto->imagenes()->delete();
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }

    public function getByCodigo($codigo)
    {
        $producto = Producto::with(['imagenes', 'depositos'])->where('codigo', $codigo)->firstOrFail();
        return response()->json($producto);
    }
    
    public function stockPorDeposito()
    {
        $depositos = Deposito::with('productos')->get();
        return view('productos.stock_por_deposito', compact('depositos'));
    }
    
    public function stockMinimo()
    {
        $productos = Producto::whereRaw('stock_minimo >= disponible')->get();
        return view('productos.stock_minimo', compact('productos'));
    }
}    