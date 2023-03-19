<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Servicio extends Model
{
    use HasFactory;

    protected $table='servicios';
    public $timestamps=false;

    protected $fillable=[
        'tiposervicio','tiempominutos','precio','descripcion','recinto_id'
    ];

    /**
     * Función donde comunica los servicios con los empleados mediante la tabla pivote
     * relación de muchos a muchos
     */
    public function empleados(){
        return $this->belongsToMany(Empleado::class);

}
}
