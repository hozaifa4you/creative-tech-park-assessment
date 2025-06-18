<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center md:justify-between p-3">
                    <h4 class="text-3xl font-semibold">Products</h4>
                    <a href="{{ route('dashboard.products.create') }}"
                        class="bg-accent text-white px-3 py-2 rounded">Create</a>
                </div>

                <div class="mt-5">

                </div>

                <div class="flex items-center justify-center">
                    {{-- {{ $products->link() }} --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
