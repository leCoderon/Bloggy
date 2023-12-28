<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param $articles
     * 
     */
    public function index(Article $article)
    {

        // Pour afficher les articles les plus récents
        $articles = $article::orderBy('updated_at', 'desc')->paginate(10);
        return view('article.index', ['articles' => $articles]);
    }
    /**
     * Display the homepage.
     * @param $articles
     */
    public function homepage(Article $article)
    {
        // Pour afficher les articles les plus récents
        $articles = $article::orderBy('updated_at', 'desc')->paginate(10);
        return view('homepage', ['articles' => $articles]);
    }


    // Likes on articles
    public function like(Article $article)
    {
        $user = auth()->user();

        if (!$user->likedArticles->contains($article->id)) {
            $user->likedArticles()->attach($article->id);
            $article->increment('likes');
        } else {
            $user->likedArticles()->detach($article->id);
            $article->decrement('likes');
        }

        return response()->json(['success' => true, 'likes' => $article->likes]);
    }


    /**
     * Display a form to create new article
     */
    public function new()
    {
        return view('article.new');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Article $article, Request $request)
    {
        $article->title = $request->title;
        $article->sub_title = $request->sub_title;
        $article->content = $request->content;
        $article->online = $request->online;
        $article->user_id = Auth::user()->id;
        $article->save();
        return redirect()->back()->with('success', 'Votre article a bien été créer');
    }

    /**
     * Display the specified resource.
     */

    public function show(Article $article)
    {
        $likes = $article->likes()->count();

        return view('article.show', ['article' => $article, 'likes' => $likes]);
    }

    /**
     * Display a login form to update articles
     */
    public function edit(Article $article)
    {
        return view('article.edit', ['article' => $article]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Article $article, Request $request)
    {
        $article->title = $request->title;
        $article->sub_title = $request->sub_title;
        $article->content = $request->content;
        $article->online = $request->online;
        $article->save();
        return redirect()->route('dashboard')->with('success', 'Votre article a bien été modifié');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Article $article)
    {
        $article->delete();
        return redirect()->back()->with('success', 'Votre article a bien été supprimé');

    }
}
