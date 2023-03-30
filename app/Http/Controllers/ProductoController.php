<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoResource;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Deposito;
use Illuminate\Support\Facades\DB;

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
        $categorias = Categoria::all();
        return view('productos.create', compact('depositos', 'categorias'));
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->codigo = $request->codigo;
        $producto->idCategoria = $request->categoria;
        $producto->descripcion = $request->descripcion;
        $producto->moneda = $request->moneda;
        $producto->precio = $request->precio;
        $producto->habilitado = true;
        $producto->save();

        foreach ($request->stock_disponible as $id => $stock) {
            $producto->depositos()->attach($id, [
                'disponibles' => $stock,
                'stock_minimo' => $request->stock_minimo[$id]
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

    public function edit(Producto $producto)
    {

        $producto = $producto->load(['imagenes', 'depositos']);

        $producto = ProductoResource::make($producto);
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

        foreach ($request->stock_disponible as $id => $stock) {
            $producto->depositos()->attach($id, [
                'disponibles' => $stock,
                'stock_minimo' => $request->stock_minimo[$id]
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

    public  function search(string $codigo)
    {
        $productos = Producto::with(['categoria', 'depositos'])->where('codigo', 'like', "%$codigo%")->get();
        return ProductoResource::collection($productos);
    }

    public function stockMinimoReport()
    {
        $productos = DB::table('productos_depositos')
            ->join('productos', 'productos.idProducto', '=', 'productos_depositos.idProducto')
            ->join('depositos', 'depositos.idDeposito', '=', 'productos_depositos.idDeposito')
            ->select('productos.nombre', 'depositos.nombre as nombreDeposito', 'productos_depositos.stock_minimo')
            ->whereColumn('productos_depositos.disponibles', '<', 'productos_depositos.stock_minimo')
            ->get();

        return view('stock-minimo', compact('productos'));
    }
}
