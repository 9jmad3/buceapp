@extends('layout.app')

@section('titulo')
    Últimos usuarios llegados a BuceApp
@endsection

@section('contenido')
    @if ($users->count())
        <div class="grid justify-items-center md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($users as $user)
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <div class="flex flex-col items-center p-3">
                        <img src="{{asset('profiles').'/'.$user->image}}" class="w-24 h-24 mb-3 rounded-full shadow-lg" alt="Imagen de usuario"/>
                        <h5 class="mb-1 text-xl font-medium text-gray-900">{{$user->name}}</h5>
                        <span class="text-sm text-gray-500">{{$user->username}}</span>
                        <div class="flex mt-1 space-x-3">
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
            @endforeach
        </div>

        <div class="container px-10 py-3">
            {{$users->links()}}
        </div>
    @else
        <p class="text-center">Sigue a alguien para ver sus publicaciones aquí.</p>
    @endif
@endsection
