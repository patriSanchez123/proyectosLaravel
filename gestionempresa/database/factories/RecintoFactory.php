<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Recinto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recinto>
 */
class RecintoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $modelo=Recinto::class;
    public function definition(): array
    {
        //Le añado un numero estatico para incrementar y poderle añadir un recinto a cada cliente
        //no he sabido como hacerlo mejor para que se generen solo los datos y no tener que hacerlos a mano con el seeder
        static $numero=1;

        
        return [
            'direccion'=>$this->faker->randomElement(['C/Ortega y Gasset','C/Sierpes','C/Tetuan','C/Binefar','C/Torresquevedo','C/Algaba','C/Flota de india','C/Asunción','C/Virgen de lujan',
                                                        'C/Baño','C/Dos de mayo','Av Ocho de marzo','Aguila perdicera','C/Tucuman','C/Galera',]),
            'tiporecinto'=>$this->faker->randomElement(['Bloque','Tienda','Oficina','Garaje','Local','Casa','Jardin','Nave industrial']),
            'descripcion'=>$this->faker->paragraph(),
            'telefono'=>$this->faker->regexify('^[0-9]{9}$'),
            'cliente_id'=>$numero++];
            //funcion punk
    }
}
