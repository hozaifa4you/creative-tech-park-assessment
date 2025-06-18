<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
   use HasFactory;

   protected $fillable = [
      "name",
      "slug",
      "sku",
      "description",
      "price",
      "offer_price",
      "stock",
      "image",
      "user_id",
   ];

   public function categories()
   {
      return $this->belongsToMany(Category::class, 'product_category');
   }
}
