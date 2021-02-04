<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index()
    {
        return view('auth.login');  
    }

    public function signIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $auth = Auth::attempt([
            'email' => $request->email,
            'password' => $request->passwords,
        ], $request->remember);

        if ($auth) 
        {
            return redirect('dashboard')->with('success', 'Zalogowano');
        }
        return back()->with('danger', 'Wprowadzono błędne dane');
    }
}
