<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition(): array
   {
      return [
         'name' => $this->faker->words(2, true),
         'slug' => fn() => Str::slug($this->faker->unique()->words(2, true)),
         'sku' => strtoupper(Str::random(8)),
         'description' => $this->faker->paragraph,
         'price' => $this->faker->numberBetween(100, 1000),
         'offer_price' => $this->faker->numberBetween(50, 900),
         'stock' => $this->faker->numberBetween(10, 100),
         'image' => 'gm.png',
         'user_id' => 20,
      ];
   }
}
