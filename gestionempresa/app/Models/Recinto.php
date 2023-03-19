<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

//preguntar si estábien
class Recinto extends Model

{
    use HasFactory;
    protected $table='recintos';
    public $timestamps=false;
    
    protected $fillable=[
                    'direccion','tiporecinto','descripcion','telefono','cliente_id'
    ];

    /**
     * Función donde se comunica los recintos con los servicios 
     * esta relación es de uno a muchos
     */
    public function servicios(): HasMany{
        return $this->hasMany(Servicio::class);
        //$servicio=Recinto::find(4)->servicios

}

    /**
     * Función comunica el recinto con el cliente correspondiente 
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

}