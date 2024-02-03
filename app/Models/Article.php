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

    
    //Un  Article appartient à plusieur utilisateur :
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //un Article peut avoir plusieurs commentaires :
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Article peut Liker par plusieurs Users :
    public function likes()
    {
        return $this->belongsToMany(User::class, 'article_likes');
    }

}
