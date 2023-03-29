<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    protected $fillable = ['nombre', 'direccion'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withPivot('disponible', 'stock_minimo');
    }
}
