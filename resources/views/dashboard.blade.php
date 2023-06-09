@extends('layout.app')

@section('titulo')
    Perfil: {{$user->username}}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                @if($user->image)
                    <img src="{{ asset('profiles/'.$user->image) }}" class="rounded-full shadow" alt="">
                @else
                    <img src="{{ asset('images/user.svg') }}" alt="">
                @endif
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                <div class="flex items-center gap-2">
                    <p class="text-2xl text-gray-700">
                        {{ $user->name }}
                    </p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{route('perfil.index')}}" class="text-gray-500 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>
                <p class="text-sm text-gray-800 mb-3 font-bold">
                    {{$user->followers->count()}}
                    <span class="font-normal">@choice('Seguidor|Seguidores',$user->followers->count())</span>
                </p>
                <p class="text-sm text-gray-800 mb-3 font-bold">
                    {{$user->followings->count()}}
                    <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-sm text-gray-800 mb-3 font-bold">
                    {{$user->posts->count()}}
                    <span class="font-normal">@choice('Publicación|Publicaciones',$user->posts->count())</span>
                </p>

                {{-- Botón follow unfollow --}}
                @auth
                @if ($user->id !== auth()->user()->id)
                    @if ($user->follow(auth()->user()))
                    <form action="{{route('users.unfollow',$user)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input
                        type="submit"
                        value="Dejar de seguir"
                        class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer">
                    </form>
                    @else
                    <form action="{{route('users.follow',$user)}}" method="POST">
                        @csrf
                        <input
                        type="submit"
                        value="seguir"
                        class="bg-purple-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer">
                    </form>
                    @endif
                @endif
                @endauth

            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div>
                        <a href="{{route('posts.show',['post' => $post, 'user' => $user])}}">
                            <img src="{{asset('uploads').'/'.$post->image}}" alt="Imagen del post {{$post->title}}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="container px-10 py-3">
                {{$posts->links()}}
            </div>
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay posts</p>
        @endif
    </section>
@endsection
