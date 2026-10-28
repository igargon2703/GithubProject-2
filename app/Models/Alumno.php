<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alumno extends Model
{
    use HasFactory;

    // Nombre exacto de la tabla en tu migración
    protected $table = 'alumno';

    // Permite la asignación masiva de todos los campos
    protected $fillable = [
        'nombre',
        'apellidos',
        'fnac',
        'genero',
        'nacceso',
    ];

    public function matriculas(): HasMany
    {
        return $this->hasMany(Matricula::class);
    }
}