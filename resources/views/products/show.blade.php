<x-homepage-layout>
    {{-- Navbar --}}
    <x-home.navbar />

    {{-- content --}}
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">
                <!-- Product Image -->
                <div class="space-y-4">
                    <div class="aspect-square bg-gray-100 rounded-lg border border-gray-200 overflow-hidden">
                        <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}"
                            class="w-full h-full object-contain">
                    </div>
                </div>

                <!-- Product Details -->
                <div class="space-y-6">
                    <!-- Product Name -->
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 capitalize">{{ $product->name }}</h1>
                    </div>

                    <!-- SKU -->
                    <div class="border-b border-gray-200 pb-4">
                        <div class="flex items-center text-sm text-gray-600">
                            <span class="font-medium">SKU:</span>
                            <span class="ml-2 uppercase">{{ $product->sku }}</span>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="space-y-2">
                        <div class="flex items-center space-x-4">
                            <span class="text-3xl font-bold text-gray-900">${{ $product->offer_price }}</span>
                            <span class="text-xl text-gray-500 line-through">${{ $product->price }}</span>
                            <span
                                class="inline-flex items-center px-2 py-1 rounded-md text-sm font-medium bg-red-100 text-red-800">
                                @php
                                    $discount = (($product->price - $product->offer_price) / $product->price) * 100;
                                    $discount = round($discount);
                                    $discount = $discount > 0 ? $discount : 0;
                                @endphp

                                {{ $discount }}% OFF
                            </span>
                        </div>
                        <p class="text-sm text-gray-600">Regular Price: {{ $product->price }} | Sale Price:
                            ${{ $product->offer_price }}</p>
                    </div>

                    <!-- Stock Status -->
                    <div
                        class="border {{ $product->stock > 0 ? 'border-green-200 bg-green-50' : 'border-red-200 bg-red-50' }} rounded-md p-3">
                        <div class="flex items-center">
                            <div
                                class="w-3 h-3 rounded-full mr-2 {{ $product->stock > 0 ? 'bg-green-500' : 'bg-red-500' }}">
                            </div>
                            <span
                                class="text-sm font-medium {{ $product->stock > 0 ? 'text-green-700' : 'text-red-700' }}">{{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</span>
                            <span
                                class="ml-2 text-sm {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">({{ $product->stock }}
                                units available)</span>
                        </div>
                    </div>

                    <!-- Quantity Selection -->
                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-gray-700">Quantity</label>
                        <div class="flex items-center space-x-3">
                            <button id="decreaseBtn"
                                class="w-10 h-10 rounded-md border border-gray-300 flex items-center justify-center hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">
                                <i class="fas fa-minus text-sm"></i>
                            </button>
                            <input type="number" id="quantityInput" value="1" min="1" max="24"
                                class="quantity-input w-20 text-center py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <button id="increaseBtn"
                                class="w-10 h-10 rounded-md border border-gray-300 flex items-center justify-center hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">
                                <i class="fas fa-plus text-sm"></i>
                            </button>
                        </div>
                        <p class="text-xs text-gray-500">Maximum 5 units per order</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3 pt-4">
                        <button
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 flex items-center justify-center">
                            <i class="fas fa-shopping-cart mr-2"></i>
                            Add to Cart
                        </button>
                        <button
                            class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-6 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 flex items-center justify-center">
                            <i class="fas fa-heart mr-2"></i>
                            Add to Wishlist
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product Description -->
            <div class="border-t border-gray-200 p-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Product Description</h2>
                <div class="prose max-w-none text-gray-600">
                    <p class="leading-relaxed mb-4">
                        {{ $product->description }}
                    </p>
                </div>
            </div>

            <!-- Product Information Summary -->
            <div class="border-t border-gray-200 bg-gray-50 p-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Product Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-700">Product Name:</span>
                            <span class="text-sm text-gray-600">{{ $product->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-700">SKU:</span>
                            <span class="text-sm text-gray-600">{{ $product->sku }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-700">URL Slug:</span>
                            <span class="text-sm text-gray-600">{{ $product->slug }}</span>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-700">Regular Price:</span>
                            <span class="text-sm text-gray-600">${{ $product->price }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-700">Sale Price:</span>
                            <span class="text-sm text-gray-600">${{ $product->offer_price }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-700">Stock Available:</span>
                            <span class="text-sm text-gray-600">{{ $product->stock }} units</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <x-home.footer />


    @section('scripts')
        <script>
            // Quantity controls
            const quantityInput = document.getElementById('quantityInput');
            const decreaseBtn = document.getElementById('decreaseBtn');
            const increaseBtn = document.getElementById('increaseBtn');
            const maxStock = 24;

            function updateButtons() {
                const currentValue = parseInt(quantityInput.value);
                decreaseBtn.disabled = currentValue <= 1;
                increaseBtn.disabled = currentValue >= maxStock;
            }

            decreaseBtn.addEventListener('click', function() {
                const currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                    updateButtons();
                }
            });

            increaseBtn.addEventListener('click', function() {
                const currentValue = parseInt(quantityInput.value);
                if (currentValue < maxStock) {
                    quantityInput.value = currentValue + 1;
                    updateButtons();
                }
            });

            quantityInput.addEventListener('input', function() {
                let value = parseInt(this.value);
                if (isNaN(value) || value < 1) {
                    this.value = 1;
                } else if (value > maxStock) {
                    this.value = maxStock;
                }
                updateButtons();
            });

            // Initialize button states
            updateButtons();
        </script>
    @endsection

    @section('css')
        <style>
            .quantity-input::-webkit-outer-spin-button,
            .quantity-input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            .quantity-input {
                -moz-appearance: textfield;
            }
        </style>
    @endsection
</x-homepage-layout>
