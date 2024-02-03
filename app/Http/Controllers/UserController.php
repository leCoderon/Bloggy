<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display user's dashboard
     */
    public function dashboard()
    {
        $myArticle = Article::where('user_id', Auth::id())->paginate(3);
        return view('user.dashboard', ['myArticle' => $myArticle]);

    }
    
  

    /**
     * Display a login form to user
     */
    public function login()
    {
        return view('user.login');
    }
    /**
     * handle a new user login request
     */
    public function handleLogin(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success', 'Ravi de vous revoir ' . Auth::user()->name);

        }
        return redirect()->route('login')->with('error', 'Aucun utilisateur trouvé. Vérifier vos données!');


    }


    /**    
     * handle a new user register request
     */
    public function handleRegister(User $user, UserFormRequest $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        return redirect()->route('login')->with('success', 'Votre compte à été créer avec succès. Connectez-vous!');
    }


    /**
     * Display a register form to user
     */
    public function register()
    {
        return view('user.register');
    }

    /**
     * Logout user
     */
    public function logout()
    {
        auth::logout();
        return redirect()->route('login')->with('success', 'Vous êtes déconnectés. Connectez-vous!');

    }
    
    
}
