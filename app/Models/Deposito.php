<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'depositos';
    protected $primaryKey = 'idDeposito';

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'productos_depositos', 'idDeposito', 'idProducto')
            ->withPivot('disponibles', 'stock_minimo');
    }
}
