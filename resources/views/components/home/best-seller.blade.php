<section class="py-6 md:py-8 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-4 md:mb-6">
            <h2 class="text-lg md:text-xl font-bold text-gray-800">🏆 Best Sellers</h2>
            <a href="#" class="text-accent hover:underline text-sm">View All</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 md:gap-4">
            <x-home.best-seller-card name="MacBook Air M2" price="1,199" reviewCount="1,234" image="mac.png" />

            <x-home.best-seller-card name="iPhone 16 Pro Max" price="1,199" reviewCount="690" image="iphone.png" />

            <x-home.best-seller-card name="Galaxy Tab S9" price="799" reviewCount="567" image="tab.png" />

            <x-home.best-seller-card name="Sony Headphones" price="399" reviewCount="2,156" image="sony.png" />

            <x-home.best-seller-card name="Nintendo Switch" price="349" reviewCount="1,789" image="nintendo.png" />
        </div>
    </div>
</section>
