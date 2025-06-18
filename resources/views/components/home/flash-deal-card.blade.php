<div class="bg-white rounded-lg p-2 md:p-3 shadow-sm hover:shadow-md transition duration-300 group">
    <div class="relative ">
        <img src="{{ asset('assets/images/' . $image) }}" alt="Product"
            class="w-full h-20 md:h-24 object-contain rounded mb-2">
        <span class="absolute top-1 left-1 bg-red-500 text-white px-1 py-0.5 text-xs rounded">-{{ $discount }}</span>
    </div>
    <h3 class="text-xs font-medium mb-1 line-clamp-2 leading-tight capitalize">
        <a href="{{ route('products.show', $slug) }}">{{ $name }}</a>
    </h3>
    <div class="flex items-center mb-1">
        <span class="text-sm font-bold text-red-600">${{ $offerPrice }}</span>
        <span class="text-xs text-gray-500 line-through ml-1">${{ $price }}</span>
    </div>
    <div class="flex items-center text-xs text-yellow-500">
        ★★★★☆ <span class="text-gray-500 ml-1 text-xs">({{ $reviewCount }})</span>
    </div>

    @if (Auth::user()->role->value === 'admin')
        <div class="flex items-center gap-x-2 mt-2">
            <a class="text-xs bg-accent text-white p-1 font-semibold"
                href="{{ route('dashboard.products.edit', $slug) }}">Edit</a>
            <a class="text-xs bg-red-50 text-red-500 p-1 font-semibold">Del</a>
        </div>
    @endif
</div>
