    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <!-- Left side: Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800">Travel Agency</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="block md:hidden">
                <button id="mobile-menu-button"
                    class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Links: Hidden on mobile, shown on medium screens and above -->
            <div class="hidden md:flex space-x-6">
                <a href="#about" class="text-black font-bold text-lg hover:text-gray-900">About</a>
                <a href="#contact" class="text-black font-bold text-lg hover:text-gray-900">Contact</a>
                <a href="" class=" text-black font-bold text-lg hover:text-gray-900 "> Hajj Packages</a>
                <a href="" class=" text-black font-bold text-lg hover:text-gray-900 "> Umrah Packages</a>
            </div>
        </div>

        <!-- Mobile Menu (hidden by default) -->
        <div id="mobile-menu" class="md:hidden px-4 pt-2 pb-4 hidden">
            <a href="#about" class="block text-gray-600 hover:text-gray-900 py-2">About</a>
            <a href="#contact" class="block text-gray-600 hover:text-gray-900 py-2">Contact</a>
            <a href="" class="block text-gray-600 hover:text-gray-900 py-2"> Hajj Packages</a>
            <a href="" class="block text-gray-600 hover:text-gray-900 py-2"> Umrah Packages</a>
        </div>
    </nav>
