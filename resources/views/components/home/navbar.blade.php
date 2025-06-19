<!-- Top Banner -->
<div class="bg-red-600 text-white text-center py-2 text-xs md:text-sm">
    <p class="px-4">FREE SHIPPING on orders over $75 | 30-Day Returns | 24/7 Customer Support</p>
</div>

<!-- Header -->
<header class="bg-white shadow-sm sticky top-0 z-50">
    <!-- Top Header - Hidden on mobile -->
    <div class="border-b border-gray-100 hidden md:block">
        <div class="container px-4 py-2">
            <div class="flex justify-between items-center text-xs text-gray-600">
                <div class="flex space-x-4">
                    <span><i class="fa-solid fa-phone"></i> 1-800-TECH-MART</span>
                    <span><i class="fa-regular fa-envelope"></i> support@techmart.com</span>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-accent">Track Order</a>
                    <a href="#" class="hover:text-accent">Help</a>
                    <a href="{{ route('register') }}" class="hover:text-accent">Account</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="container px-4 py-3">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <h1 class="text-lg md:text-xl font-bold text-primary">TechMart</h1>
                <span class="text-xs text-gray-500 ml-2 hidden sm:block">Electronics</span>
            </div>

            <!-- Search - Desktop -->
            <div class="hidden lg:flex flex-1 max-w-2xl mx-8">
                <div class="relative w-full flex items-center gap-0">
                    <input type="text" placeholder="Search for products..."
                        class="w-full px-4 py-2 text-sm border border-gray-300 rounded-l-md focus:outline-none focus:ring-1 focus:ring-accent focus:border-accent">
                    <button
                        class="bg-accent border border-accent text-white px-4 py-2 rounded-r-md hover:bg-blue-600 text-sm">
                        Search
                    </button>
                </div>
            </div>

            <!-- Header Actions -->
            <div class="flex items-center space-x-3">
                <!-- Mobile Search Button -->
                <button class="lg:hidden text-gray-600 hover:text-accent p-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>

                <a href="{{ route('user.dashboard') }}"
                    class="hidden md:flex flex-col items-center text-gray-600 hover:text-accent p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="text-xs">Account</span>
                </a>
                <a href="#" class="hidden md:flex flex-col items-center text-gray-600 hover:text-accent p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>
                    <span class="text-xs">Wishlist</span>
                </a>
                <a href="#" class="flex flex-col items-center text-gray-600 hover:text-accent relative p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.293 2.293A1 1 0 004 16h16M7 13v6a2 2 0 002 2h6a2 2 0 002-2v-6">
                        </path>
                    </svg>
                    <span class="text-xs hidden sm:block">Cart</span>
                    <span
                        class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                </a>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-600 hover:text-accent p-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Search Bar -->
    <div class="lg:hidden border-t px-4 py-2">
        <div class="relative">
            <input type="text" placeholder="Search products..."
                class="w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-accent focus:border-accent">
            <button class="absolute right-2 top-2 text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-gray-50 border-t">
        <div class="container mx-auto px-4">
            <ul class="flex space-x-4 md:space-x-8 py-2 text-sm overflow-x-auto scrollbar-hide">
                <li><a href="#" class="text-gray-700 hover:text-accent whitespace-nowrap py-1">All</a></li>
                <li><a href="#" class="text-gray-700 hover:text-accent whitespace-nowrap py-1">Laptops</a>
                </li>
                <li><a href="#" class="text-gray-700 hover:text-accent whitespace-nowrap py-1">Phones</a></li>
                <li><a href="#" class="text-gray-700 hover:text-accent whitespace-nowrap py-1">Tablets</a>
                </li>
                <li><a href="#" class="text-gray-700 hover:text-accent whitespace-nowrap py-1">Audio</a>
                </li>
                <li><a href="#" class="text-gray-700 hover:text-accent whitespace-nowrap py-1">Gaming</a>
                </li>
                <li><a href="#" class="text-red-600 hover:text-red-700 whitespace-nowrap font-medium py-1">🔥
                        Deals</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
