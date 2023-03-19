<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class alumnoSeeder extends Seeder
{
    protected $table='alumnos';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $alumno1 = new Alumno();
        $alumno1->nombre = 'Patri';
        $alumno1->apellidos = 'Sánchez González';
        $alumno1->email='patri@gmail.com';
        $alumno1->save();

        $alumno2 = new Alumno();
        $alumno2->nombre = 'Javier';
        $alumno2->apellidos = 'Alonso Trigo';
        $alumno2->email='javier@gmail.com';
        $alumno2->save();

        $alumno3 = new Alumno();
        $alumno3->nombre = 'Teresa';
        $alumno3->apellidos = 'Claveria Pérez';
        $alumno3->email='teresa@gmail.com';
        $alumno3->save();


        $alumno4 = new Alumno();
        $alumno4->nombre = 'Alejandro';
        $alumno4->apellidos = 'Civera González';
        $alumno4->email='alejandro@gmail.com';
        $alumno4->save();


        $alumno5 = new Alumno();
        $alumno5->nombre = 'Rafael';
        $alumno5->apellidos = 'Fernandez Serrano';
        $alumno5->email='rafael@gmail.com';
        $alumno5->save();


        $alumno6 = new Alumno();
        $alumno6->nombre = 'Sandra';
        $alumno6->apellidos = 'Rodrigez Andrades';
        $alumno6->email='sandra@gmail.com';
        $alumno6->save();



        
        
    }
}
