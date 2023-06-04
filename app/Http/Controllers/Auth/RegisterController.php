<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(){
        return @view('auth.register');
    }

    public function store(Request $request){
        //Modificar request
        $request->request->add(['username' => Str::slug($request->username)]);

        //Validation
        $this->validate($request, [
            'name' => ['required','max:30'],
            'username' => ['required','unique:users','min:4','max:30'],
            'email' => ['required','unique:users','email','max:60'],
            'password' => ['required','confirmed','min:6']
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //Autentication
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->route('posts.index',[
            'user' => auth()->user()
        ]);
    }

    public function destroy(){
        dd('Post...');
     }

}
