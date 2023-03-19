<?php

namespace Database\Seeders;

use App\Models\Empleado;
use App\Models\Empleado_Servicio;
use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Empleado_Servicio_Seeder extends Seeder
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
     protected $table='empleado_servicio';
     
    public function run(): void
    {
        $empleado=Empleado::find(1);
        $empleado->servicios()->attach([1,2,3]);

        $empleado2=Empleado::find(2);
        $empleado2->servicios()->attach([4,5,6]);

        $empleado3=Empleado::find(3);
        $empleado3->servicios()->attach([7,8,9]);

        $empleado4=Empleado::find(4);
        $empleado4->servicios()->attach([10,11,12]);

        $empleado5=Empleado::find(5);
        $empleado5->servicios()->attach([13,14,15]);

        $empleado6=Empleado::find(6);
        $empleado6->servicios()->attach([16,17,18]);

        $empleado7=Empleado::find(7);
        $empleado7->servicios()->attach([19,20,21]);

        $empleado8=Empleado::find(8);
        $empleado8->servicios()->attach([22,23,24]);

        $empleado9=Empleado::find(9);
        $empleado9->servicios()->attach([25,26,27]);

        $empleado10=Empleado::find(10);
        $empleado10->servicios()->attach([28,29,30]);
    }
}
