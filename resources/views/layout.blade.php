<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Product Management')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center gap-8">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">
                    Product Manager
                </a>
                <div class="flex gap-4">
                    <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-900">Products</a>
                    <a href="{{ route('admin.categories.index') }}" class="text-gray-600 hover:text-gray-900">Categories</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Login</a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="min-h-screen py-8">
        @yield('content')
    </main>

    <footer class="bg-white border-t mt-12">
        <div class="container mx-auto px-4 py-6 text-center text-gray-600 text-sm">
            <p>&copy; {{ date('Y') }} Product Management CRUD Application. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
