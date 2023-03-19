<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $modelo=Cliente::class;

    public function definition(): array
    {
        return [
            'nombre'=>$this->faker->randomElement(['Patricia','Dolores','Manuel','Javier','Alejandoro'
            ,'Carlos','Pablo','Cristina','Rocio','Maria','Dolores','Sofia','Sara','Daniel','Ataulfo','Rafael','Antonia',
            'Jimena','Romeo','José','Sonia','Adriana','Miguel','Angel','Angela','Rubén','Elias','Javier']),

            'apellidos'=>$this->faker->randomElement(['Sánchez Rodrigez','González Martí','Mendoza Salazar','Civera Prat','León Sánchez','Trigo Delgado','Fernandez Exposito','Serrano Alba','Moreno Corento','Calderon Cobos',
            'Jiménez García','Ozuna Japón','Ruiz Marchena','Marchena Ortega','Jimenez Toribio','Otero Medina',
            'Rodriguez Hidalfo','Domingez González','Trapero Jiménez']),
            
            'telefono'=>$this->faker->regexify('^[0-9]{9}$'),
            'email'=>$this->faker->safeEmail()
        ];
    }
}
