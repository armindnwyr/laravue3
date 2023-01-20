<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstudianteResource extends JsonResource
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
            'codigo' =>$this->codigo,
            'sexo'=>$this->sexo,
            'correo'=>$this->correo,
        ];
    }
}
