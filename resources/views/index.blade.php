<x-homepage-layout>
    {{-- Navbar --}}
    <x-home.navbar />

    {{-- Hero --}}
    <x-home.hero />

    {{-- Categories --}}
    <x-home.categories />

    {{-- Flash Deal --}}
    <x-home.flash-deal :deals="$flash_deals" />

    {{-- Best Seller --}}
    <x-home.best-seller :sellers="$best_sellers" />

    {{-- Brand Showcase --}}
    <x-home.brand-showcase />

    {{-- Services --}}
    <x-home.services />

    {{-- Newsletter --}}
    <x-home.newsletter />

    {{-- Footer --}}
    <x-home.footer />
</x-homepage-layout>
