<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class ProductoResource extends JsonResource
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
            'idProducto' => (string)$this->idProducto,
            'nombre' => $this->nombre,
            'codigo' => $this->codigo,
            'descripcion' => $this->descripcion,
            'moneda' => $this->moneda,
            'precio' => $this->precio,
            'categoria' => [
                'id' => $this->idCategoria,
                'nombre' => $this->categoria->nombre,
            ],
            'stock' => DepositoResource::collection($this->depositos),

        ];
    }
}
