<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InformeResource extends JsonResource
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
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'categoria' => $this->categoria,
            'centro' => $this->centro,
            'pdf' => $this->pdf,
            'fecha' => $this->fecha,
            'image' => $this->image,
            'docente' => new DocenteResource($this->whenLoaded('docente')),
            'estudiante' => new EstudianteResource($this->whenLoaded('estudiante')),
        ];
    }
}
