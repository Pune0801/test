<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class DepositoResource extends JsonResource
{
     /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     *
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'idDeposito' => (string)$this->idDeposito,
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'disponible' => $this->pivot->disponibles,
            'stock_minimo' => $this->pivot->stock_minimo,            
        ];
    }
}
