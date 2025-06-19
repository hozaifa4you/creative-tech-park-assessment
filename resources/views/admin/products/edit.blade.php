<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Create New Product</h1>
                <p class="mt-1 text-sm text-gray-600">Add a new product to your inventory with all the necessary details.
                </p>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                    <ul class="list-none">
                        @foreach ($errors->all() as $error)
                            <li class="text-sm font-semibold">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Container -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <form class="space-y-6 p-6" action="{{ route('dashboard.products.update', $product->id) }}"
                    method="POST" id="create-product-form" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Information Section -->
                    <div class="border-b border-gray-200 pb-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-info-circle text-blue-500 mr-2 text-sm"></i>
                            Basic Information
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Product Name -->
                            <div class="md:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                    Product Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" name="name"
                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                    placeholder="Enter product name" required value="{{ $product->name }}">
                            </div>

                            @php
                                $ids = $product->categories->map(function ($category) {
                                    return $category->id;
                                });

                                $ids = json_encode($ids ?? '[]');

                                $preCategories = $product->categories->map(function ($c) {
                                    return $c->slug;
                                });
                            @endphp

                            <input hidden name="categories" value="{{ $ids }}" id="categories">

                            <!-- Slug -->
                            <div>
                                <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">
                                    URL Slug <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="slug" name="slug" value="{{ $product->slug }}"
                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                    placeholder="product-url-slug" required>
                                <p class="mt-1 text-xs text-gray-500">Used in product URL (lowercase, no spaces)</p>
                            </div>

                            <!-- SKU -->
                            <div>
                                <label for="sku" class="block text-sm font-medium text-gray-700 mb-1">
                                    SKU <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="sku" name="sku" value="{{ $product->sku }}"
                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                    placeholder="PROD-001" required>
                                <p class="mt-1 text-xs text-gray-500">Stock Keeping Unit (unique identifier)</p>
                            </div>
                        </div>

                        <!-- Categories -->
                        <div class="mt-4">
                            <label for="categories" class="block text-sm font-medium text-gray-700 mb-1">
                                Categories
                            </label>
                            <div class="relative">
                                <!-- Selected Categories (Chips) -->
                                <div id="selectedCategories" class="flex flex-wrap gap-2 mb-2 min-h-[24px]">
                                    <!-- Selected category chips will appear here -->
                                </div>

                                <!-- Search Input -->
                                <div class="relative">
                                    <input type="text" id="categorySearch"
                                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                        placeholder="Search and select categories..." autocomplete="off">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <i class="fas fa-search text-gray-400 text-xs"></i>
                                    </div>
                                </div>

                                <!-- Dropdown Options -->
                                <div id="categoryDropdown"
                                    class="category-dropdown absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-md shadow-lg max-h-48 overflow-y-auto">
                                    <div class="py-1">
                                        @foreach ($categories as $category)
                                            <div class="category-option px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 cursor-pointer flex items-center"
                                                data-category="{{ $category->slug }}" data-id="{{ $category->id }}">
                                                {{ $category->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Select one or more categories for your product</p>
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                                Description
                            </label>
                            <textarea id="description" name="description" rows="3"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400 resize-none"
                                placeholder="Enter detailed product description...">{{ $product->description }}</textarea>
                        </div>
                    </div>

                    <!-- Pricing & Inventory Section -->
                    <div class="border-b border-gray-200 pb-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-dollar-sign text-green-500 mr-2 text-sm"></i>
                            Pricing & Inventory
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Price -->
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">
                                    Regular Price <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 text-sm">$</span>
                                    </div>
                                    <input type="number" id="price" name="price" value="{{ $product->price }}"
                                        step="0.01" min="0"
                                        class="w-full pl-7 pr-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        placeholder="0.00" required>
                                </div>
                            </div>

                            <!-- Offer Price -->
                            <div>
                                <label for="offer_price" class="block text-sm font-medium text-gray-700 mb-1">
                                    Sale Price
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 text-sm">$</span>
                                    </div>
                                    <input type="number" id="offer_price" name="offer_price"
                                        value="{{ $product->offer_price }}" step="0.01" min="0"
                                        class="w-full pl-7 pr-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        placeholder="0.00">
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Optional discounted price</p>
                            </div>

                            <!-- Stock -->
                            <div>
                                <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">
                                    Stock Quantity <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="stock" name="stock" value="{{ $product->stock }}"
                                    min="0"
                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                    placeholder="0" required>
                            </div>
                        </div>
                    </div>

                    <!-- Product Image Section -->
                    <div class="pb-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-image text-purple-500 mr-2 text-sm"></i>
                            Product Image
                        </h2>

                        <div class="mt-2">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                                Upload Image
                            </label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-4 pb-4 border-2 border-gray-300 border-dashed rounded-md hover:border-gray-400 transition duration-200">
                                <div class="space-y-1 text-center">
                                    <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="image"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                            <span>Upload a file</span>
                                            <input id="image" name="image" type="file" class="sr-only"
                                                accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-200">
                        <button type="submit"
                            class="flex-1 sm:flex-none bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 text-sm rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 flex items-center justify-center">
                            <i class="fas fa-plus mr-2 text-xs"></i>
                            Create Product
                        </button>

                        <button type="button"
                            class="flex-1 sm:flex-none bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-6 text-sm rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 flex items-center justify-center">
                            <i class="fas fa-save mr-2 text-xs"></i>
                            Save as Draft
                        </button>

                        <button type="button"
                            class="flex-1 sm:flex-none bg-white hover:bg-gray-50 text-gray-700 font-medium py-2 px-6 text-sm rounded-md border border-gray-300 transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 flex items-center justify-center">
                            <i class="fas fa-times mr-2 text-xs"></i>
                            Cancel
                        </button>
                    </div>
                </form>
            </div>

            <!-- Help Text -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-md p-3">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-info-circle text-blue-400 text-sm"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800">Tips for creating products</h3>
                        <div class="mt-1 text-xs text-blue-700">
                            <ul class="list-disc pl-4 space-y-1">
                                <li>Use clear, descriptive product names that customers will search for</li>
                                <li>Keep SKUs consistent with your inventory management system</li>
                                <li>High-quality images improve conversion rates significantly</li>
                                <li>Set competitive pricing by researching similar products</li>
                                <li>Select relevant categories to help customers find your products</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            // Category selector functionality
            const categorySearch = document.getElementById("categorySearch");
            const categoryDropdown = document.getElementById("categoryDropdown");
            const selectedCategories = document.getElementById("selectedCategories");
            const categoryOptions = document.querySelectorAll(".category-option");
            const categoryElement = document.getElementById("categories");

            let selectedCategoryList = @json($preCategories); // slugs
            let ids = @json($ids); // ids

            console.log("Selected category slugs:", selectedCategoryList);
            console.log("Selected category IDs:", ids);

            // ========== SHOW EXISTING SELECTED CATEGORIES ON LOAD ==========
            document.addEventListener("DOMContentLoaded", function() {
                selectedCategoryList.forEach((categorySlug) => {
                    const categoryText = getCategoryTextBySlug(categorySlug);
                    if (!categoryText) return;

                    const chip = document.createElement("div");
                    chip.className =
                        "category-chip inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200";
                    chip.innerHTML = `
                    ${categoryText}
                    <button type="button" class="ml-2 text-blue-600 hover:text-blue-800 focus:outline-none" onclick="removeCategory('${categorySlug}', this)">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                `;
                    chip.setAttribute("data-category", categorySlug);
                    selectedCategories.appendChild(chip);

                    const option = document.querySelector(`[data-category="${categorySlug}"]`);
                    if (option) option.style.display = "none";
                });

                categoryElement.value = JSON.stringify(ids); // keep IDs in sync
            });

            function getCategoryTextBySlug(slug) {
                const el = document.querySelector(`.category-option[data-category="${slug}"]`);
                return el?.textContent?.trim() ?? null;
            }

            // ========== FOCUS: Show dropdown ==========
            categorySearch.addEventListener("focus", function() {
                categoryDropdown.classList.add("show");
            });

            // ========== CLICK OUTSIDE: Hide dropdown ==========
            document.addEventListener("click", function(e) {
                if (!e.target.closest(".relative")) {
                    categoryDropdown.classList.remove("show");
                }
            });

            // ========== SEARCH FILTER ==========
            categorySearch.addEventListener("input", function() {
                const searchTerm = this.value.toLowerCase();
                categoryOptions.forEach((option) => {
                    const categoryText = option.textContent.toLowerCase();
                    option.style.display = categoryText.includes(searchTerm) ? "flex" : "none";
                });
                categoryDropdown.classList.add("show");
            });

            // ========== SELECT CATEGORY ==========
            categoryOptions.forEach((option) => {
                option.addEventListener("click", function() {
                    const categoryValue = this.getAttribute("data-category");
                    const id = this.getAttribute("data-id");
                    const categoryText = this.textContent.trim();

                    if (!selectedCategoryList.includes(categoryValue)) {
                        selectedCategoryList.push(categoryValue);
                        ids.push(id);
                        categoryElement.value = JSON.stringify(ids);

                        const chip = document.createElement("div");
                        chip.className =
                            "category-chip inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200";
                        chip.innerHTML = `
                        ${categoryText}
                        <button type="button" class="ml-2 text-blue-600 hover:text-blue-800 focus:outline-none" onclick="removeCategory('${categoryValue}', this)">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    `;
                        chip.setAttribute("data-category", categoryValue);

                        selectedCategories.appendChild(chip);

                        this.style.display = "none";
                    }

                    categorySearch.value = "";
                    categoryDropdown.classList.remove("show");

                    categoryOptions.forEach((opt) => {
                        if (!selectedCategoryList.includes(opt.getAttribute("data-category"))) {
                            opt.style.display = "flex";
                        }
                    });
                });
            });

            // ========== REMOVE CATEGORY ==========
            function removeCategory(categoryValue, button) {
                selectedCategoryList = selectedCategoryList.filter(cat => cat !== categoryValue);

                // Remove from IDs list as well
                const option = document.querySelector(`.category-option[data-category="${categoryValue}"]`);
                const id = option?.getAttribute("data-id");
                ids = ids.filter(i => i != id);
                categoryElement.value = JSON.stringify(ids);

                // Remove chip
                button.closest(".category-chip").remove();

                // Show dropdown option again
                if (option && option.classList.contains("category-option")) {
                    option.style.display = "flex";
                }
            }
        </script>
    @endsection


    @section('css')
        <link rel="stylesheet" href="@vite(['resources/css/select.css'])">
    @endsection
</x-app-layout>
