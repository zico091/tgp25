<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubNoteModel extends Model
{
    protected $fillable = [
        'title',
        'description',
        'is_checked',
        'note_id',
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
     public function note()
    {
        return $this->belongsTo(Note::class);
    }
}
