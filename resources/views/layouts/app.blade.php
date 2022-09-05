<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ungoofaaru Council - Portal</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans bg-gray-200" data-new-gr-c-s-check-loaded="14.1056.0" data-gr-ext-installed="">
    <div class="" style="">
        <div class="h-full bg-gray-100 overflow-y-auto">
            <div class="min-h-full">
                <header class="pb-24 bg-blue-700" x-data="{ open: false }" @click.outside="open = false"
                    @close.stop="open = false">
                    <x-portal.nav>

                    </x-portal.nav>


                    <x-portal.mobile-nav>
                        
                    </x-portal.mobile-nav>

                </header>
                <main class="-mt-24 pb-8">
                    {{ $slot }}
                </main>
                <footer>
                    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
                        <div class="border-t border-gray-200 py-8 text-sm text-gray-500 text-center sm:text-left">
                            <span class="block sm:inline">{{__('Copyright © Ungoofaaru Council')}}</span>
                        </div>
                    </div>
                </footer>
            </div>

        </div>
    </div>
</body>

</html>