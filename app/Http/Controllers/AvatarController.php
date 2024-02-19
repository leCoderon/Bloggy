<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{

    public function update(UpdateAvatarRequest $request)
    {


        if ($request->has('avatar')) {
            $avatar = $request->file("avatar");
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('avatars', $avatarName, 'public');
            auth()->user()->update(['avatar' => $avatarName]);
            return redirect()->back()->with('success', 'Photo mis à jour avec succès.');
        } else {
            return redirect()->back()->with('error', 'Veuillez importer une photo svp!');
        }
    }

    public function deleteAvatar()
    {
        $user = auth()->user();
        // Supprimer l'avatar du stockage
        if ($user->avatar) {
            Storage::disk('public')->delete('avatars/' . $user->avatar);
        }

        // Mettre à jour la base de données
        $user->update(['avatar' => null]);

        return redirect()->back()->with('success', 'Photo de profil supprimée avec succès.');
    }
}
