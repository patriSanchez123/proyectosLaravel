<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /**
         * Si se quieren añadir más hay que modificar los seeder, por que si no da fallo, con las clave
         * lo tengo así para que haya datos de prueba en todas las tablas y esten bien relacionadas
         * Para modificar hay poner el mismo numero de factory en clientes recintos y servicios
         * y en los empleados_servicio añadirle correctamente a mano los seeder con attach
         */
    public function run(): void
    {
     
        $clientes= Cliente::factory(30)->create();
    
    }
}
