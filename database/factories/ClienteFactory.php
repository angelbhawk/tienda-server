<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
    public function definition()
    {
        return [
            'nombre'=> $this->faker->firstName(),
            'apellido'=> $this->faker->lastName(),
            'direccion'=> $this->faker->address(),
            'password'=>  Hash::make('123'),
            'correo'=> $this->faker->email(),
        ];
    }
}
