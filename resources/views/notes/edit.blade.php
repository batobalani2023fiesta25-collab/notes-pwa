@extends('notes.layout')

@section('title', 'Edit Note')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8 flex items-center gap-4">
        <a href="{{ route('notes.index') }}" class="text-gray-500 hover:text-gray-700 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Edit Note</h1>
            <p class="text-gray-600 mt-1">Update your note details</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden">
        <div class="h-2 bg-gradient-to-r from-blue-500 to-blue-600"></div>
        <div class="p-6 md:p-8">

            {{-- Summary error banner --}}
            @if ($errors->any())
            <div class="mb-6 flex gap-3 px-4 py-3 bg-red-50 border border-red-300 text-red-800 rounded-lg text-sm">
                <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <p class="font-medium mb-1">Please fix the following errors:</p>
                    <ul class="list-disc list-inside space-y-0.5">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            {{-- Success message --}}
            @if (session('success'))
            <div class="mb-6 flex gap-3 px-4 py-3 bg-green-50 border border-green-300 text-green-800 rounded-lg text-sm font-medium">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('notes.update', $note) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $note->title) }}"
                        placeholder="Enter note title..."
                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm text-gray-900
                               {{ $errors->has('title') ? 'border-red-400 bg-red-50' : 'border-gray-300' }}"
                    >
                    @error('title')
                    <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Category --}}
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <input
                        type="text"
                        id="category"
                        name="category"
                        value="{{ old('category', $note->category) }}"
                        placeholder="e.g. Work, Personal, Ideas..."
                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm text-gray-900
                               {{ $errors->has('category') ? 'border-red-400 bg-red-50' : 'border-gray-300' }}"
                    >
                    @error('category')
                    <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Content --}}
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-1">
                        Content <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        id="content"
                        name="content"
                        rows="8"
                        placeholder="Write your note here..."
                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm text-gray-900 resize-y
                               {{ $errors->has('content') ? 'border-red-400 bg-red-50' : 'border-gray-300' }}"
                    >{{ old('content', $note->content) }}</textarea>
                    @error('content')
                    <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex gap-3 pt-2">
                    <button
                        type="submit"
                        class="flex-1 md:flex-none px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition text-sm"
                    >
                        Update Note
                    </button>
                    <a href="{{ route('notes.index') }}"
                       class="flex-1 md:flex-none px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition text-sm text-center">
                        Cancel
                    </a>
                </div>
            </form>

            <!-- Danger Zone -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-sm font-medium text-gray-700 mb-3">Danger Zone</p>
                <form action="{{ route('notes.destroy', $note) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this note? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 bg-red-50 text-red-600 border border-red-200 rounded-lg hover:bg-red-100 transition text-sm font-medium">
                        Delete This Note
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
