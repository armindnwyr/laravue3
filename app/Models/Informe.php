<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;

    protected $fillable = ['docente_id', 'estudiante_id', 'nombre', 'descripcion', 'categoria', 'centro', 'pdf', 'fecha'];

    public function docente(){
        return $this->belongsTo(Docente::class);
    }

    public function estudiante(){
        return $this->belongsTo(Estudiante::class);
    }
}
