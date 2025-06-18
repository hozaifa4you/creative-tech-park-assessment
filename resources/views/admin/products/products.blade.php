<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center md:justify-between p-3">
                    <h4 class="text-3xl font-semibold">Products</h4>
                    <a href="{{ route('dashboard.products.create') }}"
                        class="bg-accent text-white px-3 py-2 rounded">Create</a>
                </div>

                <div class="p-3 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 md:gap-4">
                    @forelse ($products as $product)
                        @php
                            if ($product->price > 0 && $product->offer_price < $product->price) {
                                $discount = (($product->price - $product->offer_price) / $product->price) * 100;
                                $discount = number_format(abs($discount), 2) . '%';
                            } else {
                                $discount = 0 . '%';
                            }
                        @endphp

                        <x-home.flash-deal-card :id="$product->id" :slug="$product->slug" :name="$product->name" :discount="$discount"
                            :offerPrice="$product->offer_price" :price="$product->price" :reviewCount="rand(1, 100)" :image="$product->image" />
                    @empty
                        <div class="col-span-full text-center text-gray-500">
                            No products found.
                        </div>
                    @endforelse
                </div>

                <div class="flex items-center justify-center my-3">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
