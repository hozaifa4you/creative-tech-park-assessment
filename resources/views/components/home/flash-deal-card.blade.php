<div class="bg-white rounded-lg p-2 md:p-3 shadow-sm hover:shadow-md transition duration-300 group">
    <div class="relative ">
        <img src="{{ asset('uploads/products/' . $image) }}" alt="Product"
            class="w-full h-20 md:h-24 object-contain rounded mb-2">
        <span class="absolute top-1 left-1 bg-red-500 text-white px-1 py-0.5 text-xs rounded">-{{ $discount }}</span>
    </div>
    <h3 class="text-xs font-medium mb-1 line-clamp-2 leading-tight capitalize">
        <a class="hover:underline transition duration-200"
            href="{{ route('products.show', $slug) }}">{{ $name }}</a>
    </h3>
    <div class="flex items-center mb-1">
        <span class="text-sm font-bold text-red-600">${{ $offerPrice }}</span>
        <span class="text-xs text-gray-500 line-through ml-1">${{ $price }}</span>
    </div>
    <div class="flex items-center text-xs text-yellow-500">
        ★★★★☆ <span class="text-gray-500 ml-1 text-xs">({{ $reviewCount }})</span>
    </div>

    @if ($role && $role === 'admin')
        <div class="flex items-center justify-between mt-2">
            <div class="flex items-center gap-x-2">
                <a class="text-xs bg-accent text-white p-1 font-semibold rounded"
                    href="{{ route('dashboard.products.edit', $slug ?? 'foo') }}" title="Edit the product"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <button onclick="document.getElementById('deleteModal').classList.remove('hidden')"
                    title="Delete the product" class="text-xs bg-red-50 text-red-500 p-1 font-semibold rounded"><i
                        class="fa-solid fa-trash"></i></button>
            </div>

            <span
                class="text-xs font-semibold px-1.5 py-1 rounded {{ $stock === 0 ? 'text-red-500 bg-red-50' : 'bg-blue-50 text-blue-500' }}">Stock:
                {{ $stock ?? 0 }}</span>
        </div>
    @endif
</div>

<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-md relative">

        <!-- Close Button -->
        <button onclick="document.getElementById('deleteModal').classList.add('hidden')"
            class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-xl font-bold">
            &times;
        </button>

        <!-- Modal Content -->
        <h2 class="text-lg font-semibold text-gray-800 mb-3">Confirm Deletion</h2>
        <p class="text-gray-600 mb-6">Are you sure you want to delete this product? This action cannot be undone.
        </p>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-3">
            <button onclick="document.getElementById('deleteModal').classList.add('hidden')"
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded">
                Cancel
            </button>

            <form method="POST" action="{{ route('dashboard.products.destroy', $id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                    Yes, Delete
                </button>
            </form>
        </div>
    </div>
</div>
