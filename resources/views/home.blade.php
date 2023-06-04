@extends('layout.app')

@section('titulo')
    Últimas publicaciones de tus seguidos
@endsection

@section('contenido')
    @if ($posts->count())
        <div class="grid justify-items-center md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)

            <div class="max-w-sm bg-white rounded-lg shadow">
                <div class="p-3">
                    <div class="flex justify-between">
                        <div class="flex">
                            @if($post->user->image)
                                <img class="w-10 h-10 rounded-full" src="{{ asset('profiles/'.$post->user->image) }}" alt="">
                            @else
                                <img class="w-10 h-10 rounded-full" src="{{ asset('images/user.svg') }}" alt="">
                            @endif
                            <a href="{{route('posts.index',$post->user)}}" class="ms-2 my-auto font-bold">{{$post->user->username}}</a>
                        </div>
                        <p class="my-auto text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                <a href="{{route('posts.show',['post' => $post, 'user' => $post->user])}}">
                    <img class="" src="{{asset('uploads').'/'.$post->image}}" alt="Imagen del post {{$post->title}}">
                </a>
            </div>
            @endforeach
        </div>

        <div class="container px-10 py-3">
            {{$posts->links()}}
        </div>
    @else
        <p class="text-center">Sigue a alguien para ver sus publicaciones aquí.</p>
    @endif
@endsection
