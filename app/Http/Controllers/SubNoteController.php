<?php

namespace App\Http\Controllers;

use App\Models\SubNoteModel;
use Illuminate\Http\Request;

class SubNoteController extends Controller
{

    public function index($note_id)
    {
        return SubNoteModel::where('note_id', $note_id)->get();
    }
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
    public function show(string $id)
    {
        
    }
    public function update(Request $request, string $id)
    {
        
    }
    public function destroy(string $id)
    {
        //
    }
}
