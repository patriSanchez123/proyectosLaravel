<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class moduloSeeder extends Seeder
{
    protected $table='modulos';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $modulo = new Modulo();
        $modulo->nombre= 'JavaScript';
        $modulo->save();


        $modulo2 = new Modulo();
        $modulo2->nombre = 'PHP';
        $modulo2->save();
    }
}
