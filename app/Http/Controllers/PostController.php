<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['show','index']);
    }

    public function index(User $user){
        $posts = Post::where('user_id',$user->id)->latest()->paginate(4);

        return @view('dashboard',[
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return @view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => ['required','max:255'],
            'description' => ['required'],
            'image' => ['required']
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show (User $user, Post $post){
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    public function destroy(Post $post)
    {
        //Comprobación de si el usuario es el mismo que el que
        //creo el post
        $this->authorize('delete',$post);

        //Eliminamos el post
        $post->delete();

        //Eliminamos la imagen
        $imagen_path = public_path('uploads/'.$post->image);
        if(File::exists($imagen_path)){
            unlink($imagen_path);
        }

        return redirect()->route('posts.index',auth()->user()->username);
    }
}
