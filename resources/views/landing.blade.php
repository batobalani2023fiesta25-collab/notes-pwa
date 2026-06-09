@extends('notes.layout')

@section('title', 'Notes App – Organize Your Thoughts')

@section('content')
{{-- Hero Section --}}
<div class="text-center py-16 md:py-24">
    <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-blue-100 text-blue-700 rounded-full text-sm font-medium mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
        </svg>
        PWA – Works Offline
    </div>

    <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
        Your Notes,<br class="hidden md:block">
        <span class="text-blue-600">Organized.</span>
    </h1>

    <p class="text-xl text-gray-600 max-w-2xl mx-auto mb-10 leading-relaxed">
        A clean, distraction-free notes app. Write, organize, and access your thoughts anywhere — even offline.
    </p>

    <div class="flex flex-col sm:flex-row gap-4 justify-center">
        @if (Route::has('register'))
        <a href="{{ route('register') }}"
           class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold text-base shadow-sm">
            Get Started Free
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
        </a>
        @endif
        @if (Route::has('login'))
        <a href="{{ route('login') }}"
           class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-white text-gray-700 rounded-lg hover:bg-gray-50 transition font-semibold text-base border border-gray-300 shadow-sm">
            Sign In
        </a>
        @endif
    </div>
</div>

{{-- Features Section --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">
        <div class="h-1.5 bg-gradient-to-r from-blue-500 to-blue-600"></div>
        <div class="p-6">
            <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center mb-4">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Create &amp; Edit</h3>
            <p class="text-gray-600 text-sm">Quickly capture ideas and update them anytime. Add a title, category, and content in seconds.</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">
        <div class="h-1.5 bg-gradient-to-r from-indigo-500 to-indigo-600"></div>
        <div class="p-6">
            <div class="w-10 h-10 rounded-lg bg-indigo-100 flex items-center justify-center mb-4">
                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Organize by Category</h3>
            <p class="text-gray-600 text-sm">Tag notes with custom categories to keep everything neatly organized and easy to find.</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">
        <div class="h-1.5 bg-gradient-to-r from-purple-500 to-purple-600"></div>
        <div class="p-6">
            <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center mb-4">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Works Offline</h3>
            <p class="text-gray-600 text-sm">Installable as a PWA — access your notes even without an internet connection on any device.</p>
        </div>
    </div>
</div>

{{-- CTA Section --}}
<div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden mb-8">
    <div class="h-1.5 bg-gradient-to-r from-blue-500 to-indigo-600"></div>
    <div class="p-10 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Ready to get organized?</h2>
        <p class="text-gray-600 mb-8 max-w-md mx-auto">Create a free account and start capturing your ideas today.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @if (Route::has('register'))
            <a href="{{ route('register') }}"
               class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold text-base shadow-sm">
                Create Free Account
            </a>
            @endif
            @if (Route::has('login'))
            <a href="{{ route('login') }}"
               class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition font-semibold text-base">
                Already have an account?
            </a>
            @endif
        </div>
    </div>
</div>
@endsection
