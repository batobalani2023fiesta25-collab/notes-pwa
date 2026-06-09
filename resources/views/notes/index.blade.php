@extends('notes.layout')

@section('title', 'Notes Dashboard')

@section('content')
<!-- Flash Messages -->
@if (session('success'))
<div class="mb-6 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded-lg text-sm font-medium">
    {{ session('success') }}
</div>
@endif

<!-- Page Header -->
<div class="mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-4xl font-bold text-gray-900">My Notes</h1>
            <p class="text-gray-600 mt-2">Keep track of your important thoughts and ideas</p>
        </div>
        <div class="flex gap-3">
            @auth
            <a href="{{ route('notes.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New Note
            </a>
            @else
            <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium text-sm">
                Login to Create Notes
            </a>
            @endauth
        </div>
    </div>
</div>

<!-- Filter/Search Bar -->
<div class="mb-6">
    <div class="relative">
        <input
            type="text"
            placeholder="Search notes..."
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm text-gray-900"
            id="searchInput"
            onkeyup="filterNotes()"
        >
        <svg class="absolute right-4 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
    </div>
</div>

<!-- Notes Grid -->
<div id="notesContainer">
    @if ($notes->isEmpty())
    <!-- Empty State -->
    <div class="text-center py-16 px-4">
        <svg class="mx-auto w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
        </svg>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">No notes yet</h3>
        <p class="text-gray-600 mb-6">Start creating notes to organize your thoughts and ideas</p>
        @auth
        <a href="{{ route('notes.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Create Your First Note
        </a>
        @else
        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
            Login to Get Started
        </a>
        @endauth
    </div>
    @else
    <!-- Notes Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="noteCards">
        @foreach ($notes as $note)
        <div class="note-card bg-white rounded-lg shadow hover:shadow-lg transition border border-gray-200 overflow-hidden group">
            <div class="h-2 bg-gradient-to-r from-blue-500 to-blue-600"></div>
            <div class="p-5">
                <div class="flex justify-between items-start gap-2 mb-3">
                    <h3 class="note-title text-lg font-semibold text-gray-900 group-hover:text-blue-600 transition flex-1">
                        {{ $note->title }}
                    </h3>
                    <div class="flex gap-1 shrink-0">
                        <!-- Edit button -->
                        <a href="{{ route('notes.edit', $note) }}"
                           class="text-gray-400 hover:text-blue-600 transition p-1"
                           title="Edit note">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </a>
                        <!-- Delete button -->
                        <form action="{{ route('notes.destroy', $note) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this note?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-gray-400 hover:text-red-600 transition p-1"
                                    title="Delete note">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                <p class="note-content text-gray-600 text-sm mb-4 line-clamp-3">
                    {{ $note->content ?? 'No content.' }}
                </p>
                <div class="flex items-center justify-between">
                    @if ($note->category)
                    <span class="text-xs px-2.5 py-1 bg-blue-100 text-blue-800 rounded-full">{{ $note->category }}</span>
                    @else
                    <span class="text-xs px-2.5 py-1 bg-gray-100 text-gray-600 rounded-full">Uncategorized</span>
                    @endif
                    <span class="text-xs text-gray-500">{{ $note->updated_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<!-- Statistics Footer -->
<div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
    <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Total Notes</p>
                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $notes->count() }}</p>
            </div>
            <svg class="w-12 h-12 text-blue-100" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"/>
            </svg>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Recently Updated</p>
                <p class="text-lg font-semibold text-gray-900 mt-1">
                    {{ $notes->isNotEmpty() ? $notes->first()->updated_at->diffForHumans() : 'Never' }}
                </p>
            </div>
            <svg class="w-12 h-12 text-green-100" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
            </svg>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Categories</p>
                <p class="text-3xl font-bold text-gray-900 mt-1">
                    {{ $notes->pluck('category')->filter()->unique()->count() }}
                </p>
            </div>
            <svg class="w-12 h-12 text-purple-100" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
            </svg>
        </div>
    </div>
</div>

<script>
function filterNotes() {
    const filter = document.getElementById('searchInput').value.toLowerCase();
    document.querySelectorAll('.note-card').forEach(function (card) {
        const title   = card.querySelector('.note-title').textContent.toLowerCase();
        const content = card.querySelector('.note-content').textContent.toLowerCase();
        card.style.display = (title.includes(filter) || content.includes(filter)) ? '' : 'none';
    });
}
</script>
@endsection
