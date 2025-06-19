<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
      $flash_deals = Product::where('stock', '>', 0)
         ->inRandomOrder()
         ->limit(6)
         ->get();

      $best_sellers = Product::where('stock', '>', 0)
         ->inRandomOrder()
         ->limit(5)
         ->get();

      return view("index", compact('flash_deals', 'best_sellers'));
   }
}
