<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'Gestión Artículos')</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        
        <!-- Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body, html {
                margin: 0;
                padding: 0;
                background-color: #f3f4f6;
            }
            .main-content {
                padding: 1rem 2rem;
                margin: 0;
            }
            .custom-card {
                background-color: white;
                border-radius: 0.5rem;
                box-shadow: 0 2px 4px rgba(0,0,0,0.05);
                border: 1px solid #e5e7eb;
                padding: 1rem;
                max-width: 1200px;
                margin: 0 auto;
            }
            .table-container {
                background-color: white;
                border-radius: 0.375rem;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <!-- Menú de Breeze -->
        @include('layouts.navigation')

        <!-- Contenido centrado y compacto -->
        <div class="main-content">
            <div class="custom-card">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>