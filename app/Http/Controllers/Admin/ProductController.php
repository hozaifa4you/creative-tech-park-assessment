<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $products = Product::with('categories')
         ->orderBy('created_at', 'desc')
         ->paginate(20);

      return view('admin.products.products', compact('products'));
   }



   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
      $categories = Category::all();
      return view('admin.products.create', compact('categories'));
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
      $validated = $request->validate([
         'name' => 'required|string|max:255',
         'slug' => [
            'required',
            'string',
            'min:3',
            'max:255',
            'unique:products,slug',
            'regex:/^[a-zA-Z0-9\-]+$/'
         ],
         'sku' => 'required|string|max:255|unique:products,sku',
         'description' => 'nullable|string',
         'price' => 'required|numeric|min:0',
         'offer_price' => 'nullable|numeric|min:0',
         'stock' => 'required|integer|min:0',
         'categories' => 'required|string',
         'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
      ]);

      if ($request->hasFile('image')) {
         $image = $request->file('image');
         $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
         $image->move(public_path('uploads/products'), $imageName);
         $validated['image'] = $imageName;
      }

      $user = auth()->user();
      $validated['user_id'] = $user->id;

      $product = Product::create($validated);

      $categoryIds = json_decode($request->categories);
      $categoryIds = array_map('intval', $categoryIds);

      $product->categories()->attach($categoryIds);

      return redirect()->route('dashboard.products')->with('success', 'Product created successfully.');
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(string $slug)
   {
      $product = Product::where('slug', $slug)
         ->with('categories')
         ->firstOrFail();

      $categories = Category::all();

      return view('admin.products.edit', compact('product', 'categories'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $slug)
   {
      $product = Product::where('slug', $slug)->firstOrFail();

      $validated = $request->validate([
         'name' => 'required|string|max:255',
         'slug' => [
            'required',
            'string',
            'min:3',
            'max:255',
            'regex:/^[a-zA-Z0-9\-]+$/'
         ],
         'sku' => 'required|string|max:255',
         'description' => 'nullable|string',
         'price' => 'required|numeric|min:0',
         'offer_price' => 'nullable|numeric|min:0',
         'stock' => 'required|integer|min:0',
         'categories' => 'required|string',
         'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
      ]);

      $existingProduct = Product::where('slug', $validated['slug'])
         ->where('id', '!=', $product->id)
         ->first();

      if ($existingProduct) {
         return redirect()->back()->with('error', 'Product with this slug already exists.');
      }


      if ($request->hasFile('image')) {
         if ($product->image && file_exists(public_path('uploads/products/' . $product->image))) {
            unlink(public_path('uploads/products/' . $product->image));
         }

         $image = $request->file('image');
         $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
         $image->move(public_path('uploads/products'), $imageName);
         $validated['image'] = $imageName;
      }

      $product->update($validated);

      $categoryIds = json_decode($request->categories);

      $product->categories()->detach();
      $product->categories()->attach($categoryIds);

      return redirect()->route('dashboard.products')->with('success', 'Product updated successfully.');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(int $id)
   {
      $product = Product::where('id', $id)->firstOrFail();

      if ($product->image && file_exists(public_path('uploads/products/' . $product->image))) {
         unlink(public_path('uploads/products/' . $product->image));
      }

      $product->delete();
      return redirect()->route('dashboard.products')->with('success', 'Product Successfully deleted');
   }
}
