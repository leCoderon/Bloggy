<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    // Pour afficher les articles les plus récents
    protected $dates = ['created_at'];

    protected $fillable = ['title', 'content', 'online', 'sub_title'];
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Article peut avoir plusieurs commentaires :
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'article_likes');
    }

}
