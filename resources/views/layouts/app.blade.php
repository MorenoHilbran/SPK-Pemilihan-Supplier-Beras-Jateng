<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Penentuan Daerah Pemasok Beras</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Modern Navbar -->
    <nav class="bg-white shadow-md border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo/Brand -->
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-blue-600 text-xl font-semibold tracking-tight">SPK Beras Jateng</span>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-1">
                        <a href="{{ route('home') }}" 
                           class="{{ request()->routeIs('home') ? 'bg-blue-600 text-white' : 'text-blue-600 hover:bg-blue-50' }} 
                                  px-3 py-2 rounded-md text-sm font-medium transition duration-200">
                            Home
                        </a>
                        <a href="{{ route('kriteria.index') }}" 
                           class="{{ request()->routeIs('kriteria.index') ? 'bg-blue-600 text-white' : 'text-blue-600 hover:bg-blue-50' }} 
                                  px-3 py-2 rounded-md text-sm font-medium transition duration-200">
                            Kriteria
                        </a>
                        <a href="{{ route('alternatif.index') }}" 
                           class="{{ request()->routeIs('alternatif.index') ? 'bg-blue-600 text-white' : 'text-blue-600 hover:bg-blue-50' }} 
                                  px-3 py-2 rounded-md text-sm font-medium transition duration-200">
                            Alternatif
                        </a>
                        <a href="{{ route('analisa') }}" 
                           class="{{ request()->routeIs('analisa') ? 'bg-blue-600 text-white' : 'text-blue-600 hover:bg-blue-50' }} 
                                  px-3 py-2 rounded-md text-sm font-medium transition duration-200">
                            Analisa
                        </a>
                        <a href="{{ route('perhitungan') }}" 
                           class="{{ request()->routeIs('perhitungan') ? 'bg-blue-600 text-white' : 'text-blue-600 hover:bg-blue-50' }} 
                                  px-3 py-2 rounded-md text-sm font-medium transition duration-200">
                            Perhitungan
                        </a>
                    </div>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button class="text-blue-600 hover:text-blue-800 focus:outline-none" id="mobile-menu-button">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Navigation -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}" 
                   class="{{ request()->routeIs('home') ? 'bg-blue-600 text-white' : 'text-blue-600 hover:bg-blue-50' }} 
                          block px-3 py-2 rounded-md text-base font-medium">
                    Home
                </a>
                <a href="{{ route('kriteria.index') }}" 
                   class="{{ request()->routeIs('kriteria.index') ? 'bg-blue-600 text-white' : 'text-blue-600 hover:bg-blue-50' }} 
                          block px-3 py-2 rounded-md text-base font-medium">
                    Kriteria
                </a>
                <a href="{{ route('alternatif.index') }}" 
                   class="{{ request()->routeIs('alternatif.index') ? 'bg-blue-600 text-white' : 'text-blue-600 hover:bg-blue-50' }} 
                          block px-3 py-2 rounded-md text-base font-medium">
                    Alternatif
                </a>
                <a href="{{ route('analisa') }}" 
                   class="{{ request()->routeIs('analisa') ? 'bg-blue-600 text-white' : 'text-blue-600 hover:bg-blue-50' }} 
                          block px-3 py-2 rounded-md text-base font-medium">
                    Analisa
                </a>
                <a href="{{ route('perhitungan') }}" 
                   class="{{ request()->routeIs('perhitungan') ? 'bg-blue-600 text-white' : 'text-blue-600 hover:bg-blue-50' }} 
                          block px-3 py-2 rounded-md text-base font-medium">
                    Perhitungan
                </a>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto mt-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-sm p-6">
            @yield('content')
        </div>
    </main>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>