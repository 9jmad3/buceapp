<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['only' => ['index','explore']]);
    }

    public function index()
    {
        //Obtener a quienes seguimos
        //pluck solo retorna los datos que indiquemos.
        $aIds = auth()->user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id',$aIds)->latest()->paginate(8);

        return view('home',[
            'posts'=>$posts
        ]);
    }

    public function explore()
    {
        //Obtener a quienes seguimos
        //pluck solo retorna los datos que indiquemos.
        $aIds = User::all()->pluck('id')->toArray();
        $users = User::whereIn('id',$aIds)->latest()->paginate(8);

        return view('explore',[
            'users'=>$users
        ]);
    }

    public function contact()
    {
        return view('contact');
    }
}
