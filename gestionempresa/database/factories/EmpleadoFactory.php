<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //'nombre','apellidos','nif','ss','telefono','tipocontrato','sueldo','categoria'
        return [
            'nombre'=>$this->faker->randomElement(['Patricia','Dolores','Manuel','Javier','Alejandoro'
            ,'Carlos','Pablo','Cristina','Rocio','Maria','Dolores','Sofia','Sara','Daniel','Ataulfo','Rafael','Antonia',
            'Jimena','Romeo','José','Sonia','Adriana','Miguel','Angel','Angela','Rubén','Elias','Javier']),
            'apellidos'=>$this->faker->randomElement(['Sánchez Rodrigez','González Martí','Mendoza Salazar','Civera Prat','León Sánchez','Trigo Delgado','Fernandez Exposito','Serrano Alba','Moreno Corento','Calderon Cobos',
            'Jiménez García','Ozuna Japón','Ruiz Marchena','Marchena Ortega','Jimenez Toribio','Otero Medina',
            'Rodriguez Hidalfo','Domingez González','Trapero Jiménez']),
            'nif'=>$this->faker->regexify('[0-9]{8}[A-Z]'),
            'ss'=>$this->faker->regexify('[0-9]{12}'),
            'tipocontrato'=>$this->faker->randomElement(['Fijo Discontinuo','Fin de obra y servicio','Temporal','Indefinido']),
            'sueldo'=>$this->faker->numberBetween(50,3000),
            'telefono'=>$this->faker->regexify('^[0-9]{9}$'),
        ];
    }
}
