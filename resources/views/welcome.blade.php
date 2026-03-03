<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestión de Artículos</title>
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css'])
        @endif
        
        <style>
            body {
                background-color: #ffffff;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex items-center justify-center bg-white">
            <div class="bg-gray-50 p-8 rounded-lg shadow-xl w-96">
                @if (Route::has('login'))
                    <div class="space-y-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" 
                            class="block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg text-center transition duration-300">
                                Ir al Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" 
                            class="block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg text-center transition duration-300">
                                Iniciar Sesión
                            </a>
                            
                            <a href="{{ route('register') }}" 
                            class="block w-full bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg text-center transition duration-300">
                                Registrarse
                            </a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>