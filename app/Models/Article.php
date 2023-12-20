<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'online', 'sub_title'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
