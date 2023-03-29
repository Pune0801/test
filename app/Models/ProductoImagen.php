<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoImagen extends Model
{
    use HasFactory;

    protected $table = 'productos_imagenes';
    protected $fillable = ['idProducto', 'path', 'por_defecto'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }
}
