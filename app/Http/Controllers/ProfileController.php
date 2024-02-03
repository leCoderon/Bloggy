<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateNameRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display user's profile
     */
    public function profil()
    {
        return view('user.profil');

    }
    public function updateName(UpdateNameRequest $request)
    {
       

        auth()->user()->update(['name' => $request->name]);

        return redirect()->back()->with('success', 'Nom mis à jour avec succès.');
    }

}
