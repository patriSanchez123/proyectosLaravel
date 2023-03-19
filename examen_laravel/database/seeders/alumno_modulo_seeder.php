<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class alumno_modulo_seeder extends Seeder
{
    protected $table='alumno_modulo';
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buscamos los modulos y los agregamos a la tabla pivote para relacionar los alumnos con los 
        //modulos
        $modulo=Modulo::find(1);
        $modulo->alumnos()->attach([1,2,3]);

        $modulo1=Modulo::find(2);
        $modulo1->alumnos()->attach([4,5,6]);
    }
}
