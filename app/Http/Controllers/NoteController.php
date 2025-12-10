<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * GET /notes
     * Return all notes
     */
    public function index()
    {
        return Note::with('comments')->get();
    }

    /**
     * POST /notes
     * Create a new note
     */
    public function store(Request $request)
    {
        // Validate input
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_checked' => 'boolean',
            'user_id' => 'required|string',
        ]);

        // Create new note
        $note = Note::create($data);

        return response()->json($note, 201);
               // return Note::create($data);

    }

    /**
     * GET /notes/{id}
     * Show one note
     */
    public function show($id)
    {
        return Note::with('comments')->findOrFail($id);
    }

    /**
     * PUT/PATCH /notes/{id}
     * Update a note
     */
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

    /**
     * DELETE /notes/{id}
     * Delete a note
     */
    public function destroy( string $id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return response()->json(['message' => 'Note deleted successfully']);
    }
}


