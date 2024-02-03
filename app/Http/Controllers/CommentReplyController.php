<?php

namespace App\Http\Controllers;

use App\Models\CommentReply;
use Illuminate\Http\Request;

class CommentReplyController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|exists:comments,id',
            'content' => 'required',
        ]);

        CommentReply::create([
            'user_id' => auth()->id(),
            'comment_id' => $request->comment_id,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Réponse ajoutée avec succès.');
    }

    public function update(Request $request, CommentReply $reply)
    {
        // Vérifiez si l'utilisateur peut modifier ce commentaire
        $this->authorize('update', $reply);

        $request->validate([
            'content' => 'required',
        ]);

        $reply->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->with('success', 'Réponse modifié avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(CommentReply $reply)
    {
        $this->authorize('delete', $reply);
        $reply->delete();
        return redirect()->back()->with('success', 'Réponse supprimé avec succès.');

    }

}
