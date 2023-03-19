<?php

namespace Database\Factories;

use App\Models\Recinto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ServicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    
    {
        static $number=1;
        return ['tiposervicio'=>$this->faker->randomElement(['Limpieza general','Limpieza Cristales','Limpieza de altos','Abrillantado','Pulido','Mantenimiento']),
                'tiempominutos'=>$this->faker->biasedNumberBetween(60,1000),
                'precio'=>$this->faker->biasedNumberBetween(50,10000),
                'descripcion'=>$this->faker->paragraph(),
                'recinto_id'=>$number++];
    }
}
