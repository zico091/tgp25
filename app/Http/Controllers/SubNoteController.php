<?php

namespace App\Http\Controllers;

use App\Models\SubNoteModel;
use Illuminate\Http\Request;

class SubNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($note_id)
    {
        return SubNoteModel::where('note_id', $note_id)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string', 
            'is_checked' => 'boolean',
            'note_id' => 'required|integer',
            'user_id' => 'required|integer'
        ]);
        
        $subnote = SubNoteModel::create($data);
        return response()->json($subnote, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
