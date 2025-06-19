<section class="py-6 md:py-8 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-4 md:mb-6">
            <h2 class="text-lg md:text-xl font-bold text-gray-800">🏆 Best Sellers</h2>
            <a href="#" class="text-accent hover:underline text-sm">View All</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 md:gap-4">
            @foreach ($sellers as $seller)
                <x-home.best-seller-card :name="$seller->name" :slug="$seller->slug" :price="$seller->price" :reviewCount="rand(1, 100)"
                    :image="$seller->image" />
            @endforeach
        </div>
    </div>
</section>
