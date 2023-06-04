<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (!auth()->attempt($request->only('email','password'),$request->remember)) {
            //back: redirecciona a la url anterior, en este caso a la vista de login ya que
            //las credenciales no son correctas.
            return back()->with('mensaje','Credenciales Incorrectas');
        }else{
            return redirect()->route('posts.index',[
                'user' => auth()->user()
            ]);
        }
    }
}
