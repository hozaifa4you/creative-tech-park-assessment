<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $categories = Category::withCount('products')->orderBy('created_at', 'desc')->paginate(10);

      return view('admin.categories.categories', compact('categories'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
      return view('admin.categories.create');
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
      $validated = $request->validate([
         'name' => 'required|string|max:100',
         'slug' => [
            'required',
            'string',
            'max:100',
            'min:3',
            'unique:categories,slug',
            'regex:/^[a-zA-Z0-9\-]+$/'
         ],
         'description' => 'nullable|string|max:500',
      ]);


      Category::create($validated);

      return redirect()->route('dashboard.categories')->with('success', 'Category created successfully.');
   }

   /**
    * Display the specified resource.
    */
   public function show(string $id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(string $slug)
   {
      $category = Category::where('slug', $slug)->firstOrFail();

      return view('admin.categories.edit', compact('category'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $slug)
   {
      $validated = $request->validate([
         'name' => 'required|string|max:100',
         'slug' => [
            'required',
            'string',
            'max:255',
            'regex:/^[a-zA-Z0-9\-]+$/'
         ],
         'description' => 'nullable|string|max:500',
      ]);

      $category = Category::where('slug', $validated['slug'])
         ->whereNot('slug', $slug)
         ->first();
      if ($category) {
         return redirect()->back()->with('error', 'Category with this slug already exists.');
      }


      Category::where('slug', $slug)->update($validated);

      return redirect()->route('dashboard.categories')->with('success', 'Category updated successfully.');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {
      //
   }
}
