<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;
    protected $table = 'productos';
    protected $primaryKey = 'idProducto';

    protected $fillable = ['nombre', 'codigo', 'descripcion', 'moneda', 'precio', 'habilitado'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }

    public function depositos()
    {
        return $this->belongsToMany(Deposito::class, 'productos_depositos', 'idProducto', 'idDeposito')
            ->withPivot('disponibles', 'stock_minimo');
    }

    public function imagenes()
    {
        return $this->hasMany(ProductoImagen::class, 'idProducto');
    }
}
