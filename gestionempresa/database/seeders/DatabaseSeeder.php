<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Empleado;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    
        $this->call(ClienteSeeder::class);
        $this->call(RecintoSeeder::class);
        $this->call(ServicioSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(Empleado_Servicio_Seeder::class);
    }
}
