<section class="py-6 md:py-8 bg-red-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-4 md:mb-6">
            <h2 class="text-lg md:text-xl font-bold text-gray-800">⚡ Flash Deals</h2>
            <div class="text-xs md:text-sm text-red-600">Ends in: 23:45:12</div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 md:gap-4">
            @foreach ($deals as $deal)
                @php
                    $discount =
                        $deal->price > 0 ? round((($deal->price - $deal->offer_price) / $deal->price) * 100) : 0;
                    $discount = abs($discount) . '%';

                @endphp
                <x-home.flash-deal-card :id="$deal->id" :slug="$deal->slug" :name="$deal->name" :discount="$discount"
                    :offerPrice="$deal->offer_price" :price="$deal->price" :reviewCount="rand(1, 100)" :image="$deal->image" role="user" />
            @endforeach


        </div>
    </div>
</section>
