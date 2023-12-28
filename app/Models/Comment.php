<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'article_id', 'comment'];

    public function replies()
    {
        return $this->hasMany(CommentReply::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Comment appartient à un utilisateur et à un article :
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}
