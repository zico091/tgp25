<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'description', 'is_checked', 'user_id', 'note_id'];
   public function subNotes()
{
    return $this->hasMany(SubNote::class);
}
 public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}