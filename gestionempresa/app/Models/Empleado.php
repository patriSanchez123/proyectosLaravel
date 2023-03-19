<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table='empleados';
    
    protected $fillable=['nombre','apellidos','nif','ss','telefono','tipocontrato','sueldo'];
    
    /**
     * Función donde los empleados se comunican con los servicios por 
     * en medio de la tabla pivote es ta relación es de muchos a muchos
     */
    public function servicios(){
        return $this->belongsToMany(Servicio::class);
        //$empleado=empleado::find(1)->servicios
}
}
