<div class="bg-white rounded-lg p-2 md:p-3 shadow-sm hover:shadow-md transition duration-300 group">
    <div class="relative ">
        <img src="{{ asset('assets/images/' . $image) }}" alt="Product"
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

    @if (Auth::user()->role->value === 'admin')
        <div class="flex items-center justify-between mt-2">
            <div class="flex items-center gap-x-2">
                <a class="text-xs bg-accent text-white p-1 font-semibold rounded"
                    href="{{ route('dashboard.products.edit', $slug ?? 'foo') }}" title="Edit the product"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <a title="Delete the product" class="text-xs bg-red-50 text-red-500 p-1 font-semibold rounded"><i
                        class="fa-solid fa-trash"></i></a>
            </div>

            <span
                class="text-xs font-semibold px-1.5 py-1 rounded {{ $stock === 0 ? 'text-red-500 bg-red-50' : 'bg-blue-50 text-blue-500' }}">Stock:
                {{ $stock ?? 0 }}</span>
        </div>
    @endif
</div>
