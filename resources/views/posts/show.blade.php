@extends('layout.app')

@section('titulo')
    {{$post->title}}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{asset('uploads').'/'.$post->image}}" alt="Imagen del post {{$post->title}}">



            <div class="p-3 flex justify-between gap-4">
                @auth
                    @if ($post->checkLike(auth()->user()))
                        <div class="flex my-auto">
                            <form action="{{route('posts.likes.destroy',$post)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <div class="">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>

                            <p class="font-bold">{{$post->likes->count()}}
                                <span class="font-normal">Likes</span>
                            </p>
                        </div>

                        <div>
                            <a href="{{route('posts.index',$post->user)}}">
                                <p class="font-bold">{{$post->user->username}}</p>
                            </a>
                            <p class="text-sm text-gray-500">
                                {{$post->created_at->diffForHumans()}}
                            </p>
                        </div>
                    @else
                        <div class="flex my-auto">
                            <form action="{{route('posts.likes.store',$post)}}" method="POST">
                                @csrf
                                <div class="">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>

                            <p class="font-bold">{{$post->likes->count()}}
                                <span class="font-normal">Likes</span>
                            </p>
                        </div>

                        <div>
                            <a href="{{route('posts.index',$post->user)}}">
                                <p class="font-bold">{{$post->user->username}}</p>
                            </a>
                            <p class="text-sm text-gray-500">
                                {{$post->created_at->diffForHumans()}}
                            </p>
                        </div>
                    @endif
                @endauth
            </div>

            <div class="shadow bg-white p-5 mb-5">
                <p>
                    {{$post->description}}
                </p>
            </div>


            @auth
                @if ($post->user_id == auth()->user()->id)
                <form method="POST" action="{{route('posts.destroy',$post)}}">
                    @method('DELETE')
                    @csrf
                    <input
                        type="submit"
                        value="Eliminar publicación"
                        class="w-full bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold cursor-pointer">
                </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">

                @auth
                    <p class="text-xl font-bold text-center mb-4">
                        Agrega un comentario
                    </p>

                    @if (session('message'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{session('message')}}
                        </div>
                    @endif

                    <form method="POST" action="{{route('comments.store',['post' => $post, 'user' => $user])}}">
                        @csrf
                        <div class="mb-5">
                            <label for="comment" class="mb-2 block uppercase text-gray-500 font-bold">
                                Contenido
                            </label>
                            <textarea
                                id="comment"
                                name="comment"
                                type="text"
                                placeholder="Aquí el comentario"
                                class="border p-3 w-full rounded-l
                                    @error('comment')
                                        border-red-500 rounded-lg
                                    @enderror">
                            </textarea>
                        </div>
                        @error('comment')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{$message}}
                            </p>
                        @enderror

                        <input
                            type="submit"
                            value="Comentar"
                            class="bg-purple-400 hover:bg-purple-500 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                    </form>
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comments->count())
                        @foreach ( $post->comments as $comment)
                            <div class="p-5 border-gray-300 border-b">
                                <div class="flex">
                                    @if($user->image)
                                        <img class="w-10 h-10 rounded-full" src="{{ asset('profiles/'.$comment->user->image) }}" alt="">
                                    @else
                                        <img class="w-10 h-10 rounded-full" src="{{ asset('images/user.svg') }}" alt="">
                                    @endif
                                    <a href="{{route('posts.index',$comment->user)}}" class="m-1 font-bold">{{$comment->user->username}}</a>
                                </div>
                                <p class="">{{$comment->comment}}</p>
                                <p class="text-sm text-gray-500">{{$comment->created_at->diffForHumans()}}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No hay comentarios</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
