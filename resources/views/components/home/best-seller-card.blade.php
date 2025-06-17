<div class="bg-gray-50 rounded-lg p-3 hover:shadow-md transition duration-300">
    <img src="{{ asset('assets/images/' . $image) }}" alt="Product"
        class="w-full h-24 md:h-32 object-contain rounded mb-2">
    <h3 class="text-sm font-medium mb-1 line-clamp-2 leading-tight">{{ $name }}</h3>
    <div class="flex items-center mb-2">
        <span class="text-base md:text-lg font-bold text-gray-800">${{ $price }}</span>
    </div>
    <div class="flex items-center text-xs text-yellow-500 mb-2">
        ★★★★★ <span class="text-gray-500 ml-1">({{ $reviewCount }})</span>
    </div>
    <button class="w-full bg-accent text-white py-2 rounded text-xs hover:bg-blue-600 transition duration-300">Add
        to Cart</button>
</div>
