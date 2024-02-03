<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'user_id',
        'content',
    ];


    // une réponse peut être associé à un Utilisatuer :
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // une répose peut être associé à un commentaire :

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

}
