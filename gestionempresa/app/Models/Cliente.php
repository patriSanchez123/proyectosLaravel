<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;

    
    protected $table='clientes';
    //public $timestamps=false;
    
    protected $fillable=[
                    'nombre','apellidos','email','telefono'
    ];

    /**
     * Función donde se comunica el cliente con los recintos de uno a muchos
     */
    public function recintos(): HasMany
    {
        return $this->hasMany(Recinto::class);
        //Para hacer la busque de recintos
        //$cliente=Cliente::find(1)->recintos;
    }
}
