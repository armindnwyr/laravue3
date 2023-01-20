<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocenteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'nombre'=>$this->nombre,
            'paterno'=>$this->paterno,
            'materno'=>$this->materno,
            'sexo'=>$this->sexo,
            'celular'=>$this->celular,
            'correo'=>$this->correo,
        ];
    }
}
