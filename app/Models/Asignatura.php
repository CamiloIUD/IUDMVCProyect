<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'creditos',
        'docente',
        'prerrequisito',
        'horas_trabajo_autonomo',
        'horas_trabajo_dirigido',
    ];

    public function prerrequisito()
    {
        return $this->belongsTo(Asignatura::class, 'prerrequisito');
    }
}
