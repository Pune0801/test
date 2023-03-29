<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'moneda', 'precio', 'habilitado'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function depositos()
    {
        return $this->belongsToMany(Deposito::class)->withPivot('disponible', 'stock_minimo');
    }

    public function imagenes()
    {
        return $this->hasMany(ProductoImagen::class);
    }
}
