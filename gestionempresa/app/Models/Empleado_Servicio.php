<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado_Servicio extends Model
{

    protected $table='empleado_servicio';
    
    protected $fillable=[
                    'empleado_id','servicio_id'];
    use HasFactory;
}
