<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = auth()->check()
            ? auth()->user()->notes()->latest()->get()
            : collect();

        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|max:255',
            'content'  => 'required',
            'category' => 'nullable|string|max:100',
        ]);

        auth()->user()->notes()->create($request->only('title', 'content', 'category'));

        return redirect()->route('notes.index')->with('success', 'Note created successfully!');
    }

    public function edit(Note $note)
    {
        abort_if($note->user_id !== auth()->id(), 403);

        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        abort_if($note->user_id !== auth()->id(), 403);

        $request->validate([
            'title'    => 'required|max:255',
            'content'  => 'required',
            'category' => 'nullable|string|max:100',
        ]);

        $note->update($request->only('title', 'content', 'category'));

        return redirect()->route('notes.index')->with('success', 'Note updated successfully!');
    }

    public function destroy(Note $note)
    {
        abort_if($note->user_id !== auth()->id(), 403);

        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully!');
    }
}
