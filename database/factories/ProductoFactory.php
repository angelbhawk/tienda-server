<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'=> $this->faker->words(3,true),
            'detalle'=> $this->faker->paragraphs(3,true),
            'precio'=> $this->faker->randomFloat(2, 1, 10000),
            'existencia'=> $this->faker->numberBetween(0,50),
            'envio'=> $this->faker->numberBetween(50,200)
        ];
/*
        return [
            'nombre'=> fake()->words(3),
            'detalle'=> fake()->paragraphs(3),
            'precio'=> 10,
            'existencia'=> fake()->numberBetween(0,50),
            'envio'=> fake()->numberBetween(50,200)
        ];*/
    }
}
