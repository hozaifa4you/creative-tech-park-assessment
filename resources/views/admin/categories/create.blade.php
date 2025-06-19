<x-app-layout>
    <div class="py-4">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-6">
                <div class="flex items-center space-x-3 mb-2">
                    <a href="{{ route('dashboard.categories') }}"
                        class="text-gray-400 hover:text-gray-600 transition duration-200">
                        <i class="fas fa-arrow-left text-lg"></i>
                    </a>
                    <h1 class="text-2xl font-bold text-gray-900">Create New Category</h1>
                </div>
                <p class="text-sm text-gray-600">Add a new category to organize your products effectively.</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-md mb-4">
                    <h3 class="font-medium">There were some errors with your submission:</h3>
                    <ul class="list-disc pl-5 mt-2">
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Container -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <form class="space-y-6 p-6" method="POST" action="{{ route('dashboard.categories.store') }}">
                    @csrf
                    <!-- Category Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Category Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                            placeholder="Enter category name" required maxlength="100"
                            oninput="updateSlug(); updateCharCount('name')">
                        <div class="flex justify-between items-center mt-1">
                            <p class="text-xs text-gray-500">This will be displayed as the category title</p>

                        </div>
                    </div>

                    <!-- URL Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                            URL Slug <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" id="slug" name="slug"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400 font-mono"
                                placeholder="category-url-slug" required maxlength="100"
                                pattern="^[a-z0-9]+(?:-[a-z0-9]+)*$" oninput="validateSlug(); updateCharCount('slug')">

                        </div>
                        <div class="flex justify-between items-center mt-1">
                            <div class="flex flex-col">
                                <p class="text-xs text-gray-500">Used in category URLs (lowercase, hyphens only)</p>
                            </div>

                        </div>
                        <div id="slugError" class="text-xs text-red-500 mt-1 hidden">
                            Slug can only contain lowercase letters, numbers, and hyphens
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Description
                        </label>
                        <textarea id="description" name="description" rows="4"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400 resize-none"
                            placeholder="Enter a detailed description of this category..." maxlength="500"
                            oninput="updateCharCount('description')"></textarea>
                        <div class="flex justify-between items-center mt-1">
                            <p class="text-xs text-gray-500">Describe what products belong in this category</p>

                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-200">
                        <button type="submit"
                            class="flex-1 sm:flex-none bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 text-sm rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 flex items-center justify-center">
                            <i class="fas fa-plus mr-2 text-xs"></i>
                            Create Category
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

            <!-- Help Section -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-md p-3">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-info-circle text-blue-400 text-sm"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800">Tips for creating categories</h3>
                        <div class="mt-1 text-xs text-blue-700">
                            <ul class="list-disc pl-4 space-y-1">
                                <li>Use clear, descriptive names that customers will understand</li>
                                <li>Keep category names concise but informative</li>
                                <li>URL slugs should be SEO-friendly (lowercase, no spaces)</li>
                                <li>Write descriptions that help both customers and search engines</li>
                                <li>Choose icons that visually represent your category</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
