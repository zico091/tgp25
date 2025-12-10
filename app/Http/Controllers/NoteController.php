<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return Note::with('comments')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_checked' => 'boolean',
            'user_id' => 'required|string',
        ]);
        $note = Note::create($data);

        return response()->json($note, 201);

    }
    public function show($id)
    {
        return Note::with('comments')->findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $note = Note::findOrFail($id);

        $data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'is_checked' => 'boolean',
            'user_id' => 'string',
        ]);

        $note->update($data);

        return response()->json($note);
    }
    public function destroy( string $id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return response()->json(['message' => 'Note deleted successfully']);
    }
}


