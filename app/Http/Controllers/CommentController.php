<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($note_id){ 
        return Comment::where('note_id',$note_id)->with('user')->get();
     }
    public function store(Request $request){
        $data = $request->validate([
            'content'=>'required|string',
            'note_id'=>'required|exists:notes,id',
            'user_id'=>'required|exists:users,id'
        ]);
        return Comment::create($data);
    }
    public function destroy($id){ 
        Comment::findOrFail($id)->delete(); 
        return response()->json(['message'=>'Comment deleted']); 
    }
}
