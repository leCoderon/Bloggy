<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'article_id', 'comment'];


    // un commentaire peut avoir plusieurs Réponse :
    public function replies()
    {
        return $this->hasMany(CommentReply::class);
    }


    // un commentaire peut avoir plusieurs Auteurs :
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Un Commentaire peut être associé à un article :
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}
