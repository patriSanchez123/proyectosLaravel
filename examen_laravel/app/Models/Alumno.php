<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table='alumnos';
    use HasFactory;
    public function modulos(){
        return $this->belongsToMany(Modulo::class);
}
}
