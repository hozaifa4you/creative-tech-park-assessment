<x-app-layout>
    <div class="pb-12">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                        <p class="text-sm text-gray-600">Welcome back! Here's what's happening with your store.</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-calendar-alt mr-1"></i>
                            <span id="currentDate"></span>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Products Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 card-hover">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Products</p>
                                <p class="text-3xl font-bold text-gray-900 stat-number">1,247</p>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-box text-blue-600 text-xl"></i>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center text-sm">
                                <span class="text-green-600 font-medium flex items-center">
                                    <i class="fas fa-arrow-up mr-1 text-xs"></i>
                                    +12.5%
                                </span>
                                <span class="text-gray-500 ml-2">from last month</span>
                            </div>

                            <div class="mt-3">
                                <div class="flex justify-between text-xs text-gray-600 mb-1">
                                    <span>Active Products</span>
                                    <span>1,189</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full progress-bar" style="width: 95%"></div>
                                </div>
                            </div>

                            <div class="mt-4 flex justify-between items-center">
                                <div class="text-xs text-gray-500">
                                    <i class="fas fa-exclamation-triangle text-yellow-500 mr-1"></i>
                                    58 low stock
                                </div>
                                <a href="{{ route('dashboard.products') }}"
                                    class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    View All
                                    <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categories Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 card-hover">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Categories</p>
                                <p class="text-3xl font-bold text-gray-900 stat-number">24</p>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-tags text-purple-600 text-xl"></i>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center text-sm">
                                <span class="text-green-600 font-medium flex items-center">
                                    <i class="fas fa-arrow-up mr-1 text-xs"></i>
                                    +3 new
                                </span>
                                <span class="text-gray-500 ml-2">this month</span>
                            </div>

                            <div class="mt-3">
                                <div class="flex justify-between text-xs text-gray-600 mb-1">
                                    <span>With Products</span>
                                    <span>21</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-purple-600 h-2 rounded-full progress-bar" style="width: 87.5%"></div>
                                </div>
                            </div>

                            <div class="mt-4 flex justify-between items-center">
                                <div class="text-xs text-gray-500">
                                    <i class="fas fa-folder text-gray-400 mr-1"></i>
                                    3 empty categories
                                </div>
                                <a href="{{ route('dashboard.categories') }}"
                                    class="text-purple-600 hover:text-purple-800 text-sm font-medium">
                                    Manage
                                    <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Orders Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 card-hover">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Orders</p>
                                <p class="text-3xl font-bold text-gray-900 stat-number">892</p>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-shopping-cart text-green-600 text-xl"></i>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center text-sm">
                                <span class="text-green-600 font-medium flex items-center">
                                    <i class="fas fa-arrow-up mr-1 text-xs"></i>
                                    +8.2%
                                </span>
                                <span class="text-gray-500 ml-2">from last week</span>
                            </div>

                            <div class="mt-3">
                                <div class="flex justify-between text-xs text-gray-600 mb-1">
                                    <span>Completed</span>
                                    <span>847</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-600 h-2 rounded-full progress-bar" style="width: 95%"></div>
                                </div>
                            </div>

                            <div class="mt-4 flex justify-between items-center">
                                <div class="text-xs text-gray-500">
                                    <i class="fas fa-clock text-orange-500 mr-1"></i>
                                    45 pending
                                </div>
                                <button class="text-green-600 hover:text-green-800 text-sm font-medium">
                                    View Orders
                                    <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions & Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Quick Actions -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-bolt text-yellow-500 mr-2"></i>
                            Quick Actions
                        </h3>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('dashboard.products.create') }}"
                                class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition duration-200 group">
                                <div
                                    class="w-8 h-8 bg-blue-100 group-hover:bg-blue-200 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-plus text-blue-600 text-sm"></i>
                                </div>
                                <div class="text-left">
                                    <div class="text-sm font-medium text-gray-900">Add Product</div>
                                    <div class="text-xs text-gray-500">Create new product</div>
                                </div>
                            </a>

                            <a href="{{ route('dashboard.categories.create') }}"
                                class="flex items-center p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition duration-200 group">
                                <div
                                    class="w-8 h-8 bg-purple-100 group-hover:bg-purple-200 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-tag text-purple-600 text-sm"></i>
                                </div>
                                <div class="text-left">
                                    <div class="text-sm font-medium text-gray-900">Add Category</div>
                                    <div class="text-xs text-gray-500">Create new category</div>
                                </div>
                            </a>

                            <button
                                class="flex items-center p-3 bg-green-50 hover:bg-green-100 rounded-lg transition duration-200 group">
                                <div
                                    class="w-8 h-8 bg-green-100 group-hover:bg-green-200 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-eye text-green-600 text-sm"></i>
                                </div>
                                <div class="text-left">
                                    <div class="text-sm font-medium text-gray-900">View Orders</div>
                                    <div class="text-xs text-gray-500">Manage orders</div>
                                </div>
                            </button>

                            <button
                                class="flex items-center p-3 bg-orange-50 hover:bg-orange-100 rounded-lg transition duration-200 group">
                                <div
                                    class="w-8 h-8 bg-orange-100 group-hover:bg-orange-200 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-chart-bar text-orange-600 text-sm"></i>
                                </div>
                                <div class="text-left">
                                    <div class="text-sm font-medium text-gray-900">View Reports</div>
                                    <div class="text-xs text-gray-500">Analytics & insights</div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-history text-gray-500 mr-2"></i>
                            Recent Activity
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div
                                    class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-box text-blue-600 text-xs"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm text-gray-900">New product "Wireless Headphones" added</p>
                                    <p class="text-xs text-gray-500">2 minutes ago</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div
                                    class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-shopping-cart text-green-600 text-xs"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm text-gray-900">Order #1247 completed</p>
                                    <p class="text-xs text-gray-500">15 minutes ago</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div
                                    class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-tag text-purple-600 text-xs"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm text-gray-900">Category "Electronics" updated</p>
                                    <p class="text-xs text-gray-500">1 hour ago</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div
                                    class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-exclamation-triangle text-yellow-600 text-xs"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm text-gray-900">Low stock alert for "Gaming Mouse"</p>
                                    <p class="text-xs text-gray-500">3 hours ago</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div
                                    class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-times text-red-600 text-xs"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm text-gray-900">Order #1245 cancelled</p>
                                    <p class="text-xs text-gray-500">5 hours ago</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                View All Activity
                                <i class="fas fa-arrow-right ml-1 text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Summary Stats -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-chart-line text-blue-500 mr-2"></i>
                        Overview Summary
                    </h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-gray-900">$24,580</div>
                            <div class="text-sm text-gray-500">Total Revenue</div>
                            <div class="text-xs text-green-600 mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>+15.3%
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-gray-900">156</div>
                            <div class="text-sm text-gray-500">New Customers</div>
                            <div class="text-xs text-green-600 mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>+8.7%
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-gray-900">4.8</div>
                            <div class="text-sm text-gray-500">Avg. Rating</div>
                            <div class="text-xs text-green-600 mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>+0.2
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-gray-900">98.5%</div>
                            <div class="text-sm text-gray-500">Uptime</div>
                            <div class="text-xs text-green-600 mt-1">
                                <i class="fas fa-check mr-1"></i>Excellent
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @section('scripts')
        <script>
            // Set current date
            document.addEventListener('DOMContentLoaded', function() {
                const currentDate = new Date().toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                document.getElementById('currentDate').textContent = currentDate;
            });

            // Animate progress bars on load
            window.addEventListener('load', function() {
                const progressBars = document.querySelectorAll('.progress-bar');
                progressBars.forEach(bar => {
                    const width = bar.style.width;
                    bar.style.width = '0%';
                    setTimeout(() => {
                        bar.style.width = width;
                    }, 500);
                });
            });

            // Add click handlers for quick actions
            const quickActionButtons = document.querySelectorAll('.grid .group');
            quickActionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const actionText = this.querySelector('.text-sm.font-medium').textContent;
                    console.log(`Quick action clicked: ${actionText}`);
                    // Add your navigation logic here
                });
            });
        </script>
    @endsection
</x-app-layout>
