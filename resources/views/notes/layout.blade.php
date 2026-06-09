<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Notes Management')</title>

    @vite(['resources/css/app.css', 'resources/js/app.tsx'])

    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#0f172a">

    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo/Title -->
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center h-10 w-10 rounded-lg bg-linear-to-br from-blue-500 to-blue-600">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <a href="{{ route('notes.index') }}" class="text-2xl font-bold text-gray-900 hover:text-gray-700 transition">
                        Notes App
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="flex items-center gap-4 md:gap-8">
                    @if (Route::has('login'))
                    @auth
                    <div class="flex items-center gap-4">
                        <span class="text-sm text-gray-600">{{ Auth::user()->name ?? 'User' }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-red-600 font-medium transition text-sm">
                                Logout
                            </button>
                        </form>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 font-medium transition">
                        Login
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium text-sm">
                        Sign Up
                    </a>
                    @endif
                    @endauth
                    @endif

                    <!-- Install App Button -->
                    <button
                        id="installBtn"
                        class="flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition"
                        title="Install Notes App"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Install App
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100 focus:outline-none" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Manual Install Modal (hidden by default, shown via JS) -->
    <div id="installModal" class="fixed inset-0 z-50 items-center justify-center px-4" style="display:none; background:rgba(0,0,0,0.5)">
        <div class="bg-white rounded-xl shadow-xl border border-gray-200 w-full max-w-sm overflow-hidden">
            <div class="h-1.5 bg-linear-to-r from-indigo-500 to-indigo-600"></div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Install Notes App</h3>
                    <button onclick="closeInstallModal()" class="text-gray-400 hover:text-gray-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="text-sm text-gray-500 mb-4">Follow these steps to install the app on your device:</p>

                <!-- Chrome / Android steps -->
                <div id="chromeSteps" style="display:none" class="space-y-3 text-sm">
                    <div class="flex items-start gap-3">
                        <span class="shrink-0 w-6 h-6 rounded-full bg-indigo-100 text-indigo-700 font-bold text-xs flex items-center justify-center">1</span>
                        <p class="text-gray-700">Tap the <strong>⋮ menu</strong> (three dots) in the top-right of Chrome</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="shrink-0 w-6 h-6 rounded-full bg-indigo-100 text-indigo-700 font-bold text-xs flex items-center justify-center">2</span>
                        <p class="text-gray-700">Tap <strong>"Add to Home screen"</strong> or <strong>"Install app"</strong></p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="shrink-0 w-6 h-6 rounded-full bg-indigo-100 text-indigo-700 font-bold text-xs flex items-center justify-center">3</span>
                        <p class="text-gray-700">Tap <strong>Install</strong> to confirm</p>
                    </div>
                </div>

                <!-- Safari / iOS steps -->
                <div id="safariSteps" style="display:none" class="space-y-3 text-sm">
                    <div class="flex items-start gap-3">
                        <span class="shrink-0 w-6 h-6 rounded-full bg-indigo-100 text-indigo-700 font-bold text-xs flex items-center justify-center">1</span>
                        <p class="text-gray-700">Tap the <strong>Share</strong> button (box with arrow) at the bottom</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="shrink-0 w-6 h-6 rounded-full bg-indigo-100 text-indigo-700 font-bold text-xs flex items-center justify-center">2</span>
                        <p class="text-gray-700">Scroll down and tap <strong>"Add to Home Screen"</strong></p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="shrink-0 w-6 h-6 rounded-full bg-indigo-100 text-indigo-700 font-bold text-xs flex items-center justify-center">3</span>
                        <p class="text-gray-700">Tap <strong>Add</strong> to confirm</p>
                    </div>
                </div>

                <div id="httpsNote" style="display:none" class="mt-4 p-3 bg-amber-50 border border-amber-200 rounded-lg text-xs text-amber-800">
                    <strong>Note:</strong> The automatic install prompt requires HTTPS. You can still install this app manually using the steps above.
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation (hidden on larger screens) -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-b border-gray-200 shadow-sm">
        <div class="px-4 py-3 space-y-2">
            @if (Route::has('login'))
            @auth
            <form method="POST" action="{{ route('logout') }}" class="block">
                @csrf
                <button type="submit" class="w-full text-left px-3 py-2 text-gray-600 hover:text-red-600 hover:bg-gray-100 rounded-lg transition">
                    Logout
                </button>
            </form>
            @else
            <a href="{{ route('login') }}" class="block px-3 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition">
                Login
            </a>
            @endauth
            @endif
        </div>
    </div>

    <!-- Main Content Section -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Notes App</h3>
                    <p class="text-gray-600 text-sm">
                        A modern, responsive notes management application built with Laravel and Tailwind CSS.
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('notes.index') }}" class="text-gray-600 hover:text-gray-900 transition">Dashboard</a></li>
                        @auth
                        <li><a href="{{ route('profile.edit') }}" class="text-gray-600 hover:text-gray-900 transition">Profile</a></li>
                        @endauth
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-4">Information</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-gray-900 transition">About</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900 transition">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-200 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-600 text-sm text-center md:text-left">&copy; {{ date('Y') }} Notes Management App. All rights reserved.</p>
                <p class="text-gray-600 text-sm mt-4 md:mt-0">Built with Laravel &amp; Tailwind CSS</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        function closeInstallModal() {
            document.getElementById('installModal').style.display = 'none';
        }

        // Close modal when clicking the backdrop
        document.getElementById('installModal').addEventListener('click', function (e) {
            if (e.target === this) closeInstallModal();
        });
    </script>

    {{-- Service Worker Registration --}}
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/service-worker.js');
        }
    </script>

    {{-- PWA Install (Add to Home Screen) --}}
    <script>
        let deferredPrompt = null;
        const installBtn   = document.getElementById('installBtn');
        const modal        = document.getElementById('installModal');
        const isHttps      = location.protocol === 'https:' || location.hostname === 'localhost' || location.hostname === '127.0.0.1';
        const isSafari     = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);

        // Capture the native install prompt (only fires on HTTPS)
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
        });

        installBtn.addEventListener('click', async () => {
            // Native prompt available — use it directly
            if (deferredPrompt) {
                deferredPrompt.prompt();
                const { outcome } = await deferredPrompt.userChoice;
                deferredPrompt = null;
                return;
            }

            // No native prompt — show manual install modal
            document.getElementById('chromeSteps').style.display = isSafari ? 'none' : 'block';
            document.getElementById('safariSteps').style.display = isSafari ? 'block' : 'none';
            document.getElementById('httpsNote').style.display   = isHttps  ? 'none'  : 'block';
            modal.style.display = 'flex';
        });

        window.addEventListener('appinstalled', () => {
            deferredPrompt = null;
            installBtn.style.display = 'none';
        });
    </script>
</body>

</html>
