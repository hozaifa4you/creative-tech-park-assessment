<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="mb-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Categories</h1>
                            <p class="mt-1 text-sm text-gray-600">Manage your product categories and their details</p>
                        </div>
                        <div class="mt-4 sm:mt-0">
                            <button
                                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 flex items-center">
                                <i class="fas fa-plus mr-2 text-sm"></i>
                                Add Category
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Categories Table -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
                    <!-- Table Header -->
                    <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Category List</h3>
                            <span class="text-sm text-gray-500">Showing
                                {{ $categories->firstItem() }}-{{ $categories->lastItem() }} of
                                {{ $categories->total() }}
                                categories</span>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100"
                                        onclick="sortTable('name')">
                                        <div class="flex items-center space-x-1">
                                            <span>Name</span>
                                            <i class="fas fa-sort sort-icon text-gray-400"></i>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100"
                                        onclick="sortTable('slug')">
                                        <div class="flex items-center space-x-1">
                                            <span>Slug</span>
                                            <i class="fas fa-sort sort-icon text-gray-400"></i>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100"
                                        onclick="sortTable('products')">
                                        <div class="flex items-center space-x-1">
                                            <span>Products</span>
                                            <i class="fas fa-sort sort-icon text-gray-400"></i>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="categoryTableBody">
                                @forelse ($categories as $category)
                                    <tr class="table-row">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    <div class="text-sm font-medium text-gray-900 capitalize">
                                                        {{ $category->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="text-sm text-gray-600 font-mono bg-gray-100 px-2 py-1 rounded">{{ $category->slug }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900 max-w-xs truncate">
                                                {{ $category->description ?? 'N/A' }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    <i class="fas fa-box mr-1"></i>
                                                    {{ $category->products_count }} products
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex items-center justify-end space-x-2">
                                                <button
                                                    class="text-blue-600 hover:text-blue-900 p-1 rounded hover:bg-blue-50"
                                                    title="Edit">
                                                    <i class="fas fa-edit text-sm"></i>
                                                </button>
                                                <button
                                                    class="text-gray-600 hover:text-gray-900 p-1 rounded hover:bg-gray-50"
                                                    title="View Products">
                                                    <i class="fas fa-eye text-sm"></i>
                                                </button>
                                                <button
                                                    class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-50"
                                                    title="Delete">
                                                    <i class="fas fa-trash text-sm"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>Category Not not found</td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>


                    <!-- Pagination -->
                    <div class="px-4 py-2">
                        {{ $categories->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    @section('css')
        <style>
            .table-row:hover {
                background-color: #f9fafb;
            }

            .sort-icon {
                transition: transform 0.2s ease;
            }

            .sort-icon.rotate {
                transform: rotate(180deg);
            }
        </style>
    @endsection
</x-app-layout>
