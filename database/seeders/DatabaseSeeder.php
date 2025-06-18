<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    */
   public function run(): void
   {
      $categories = Category::factory(10)->create();

      $products = Product::factory(50)->create([
         'user_id' => 20,
      ]);

      $products->each(function ($product) use ($categories) {
         $randomCategoryIds = $categories->random(rand(1, 3))->pluck('id')->toArray();
         $product->categories()->attach($randomCategoryIds);
      });
   }
}
