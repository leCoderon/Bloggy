<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Policies\CommentPolicy;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'comment' => 'required',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'article_id' => $request->article_id,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');

    }


    public function update(Request $request, Comment $comment)
    {
        // Vérifiez si l'utilisateur peut modifier ce commentaire
        $this->authorize('update', $comment);

        $request->validate([
            'comment' => 'required',
        ]);

        $comment->update([
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success', 'Commentaire modifié avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->back()->with('success', 'Commentaire supprimé avec succès.');

    }
}
