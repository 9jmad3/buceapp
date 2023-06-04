<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BuceApp</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        {{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> --}}
        <script src="https://cdn.tailwindcss.com"></script>
        {{-- Menu collapse --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="bg-gray-100 h-screen">
        <header>
            <nav class="bg-white shadow">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="{{route('home')}}" class="flex items-center">
                    <img src="{{asset('images/logo-simple.png')}}" class="h-8 mr-3" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap ">BuceApp</span>
                </a>
                <div class="flex items-center md:order-2">
                    @auth
                    <button type="button" class="flex mr-3 text-sm bg-white-800 rounded-full md:mr-0 focus:ring-4 focus:ring-white-300 " id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        @if(auth()->user()->image)
                            <img src="{{ asset('profiles/'.auth()->user()->image) }}" class="w-8 h-8 rounded-full" alt="">
                        @else
                            <img src="{{ asset('images/user.svg') }}" class="w-8 h-8 rounded-full" alt="">
                        @endif
                    </button>

                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-white-100 rounded-lg shadow " id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-white-900 ">{{auth()->user()->username}}</span>
                        <span class="block text-sm  text-white-500 truncate ">{{auth()->user()->email}}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                        <a href="{{ route('posts.index',auth()->user()->username) }}" class="block px-4 py-2 text-sm text-white-700 hover:bg-white-100 ">Dashboard</a>
                        </li>
                        <li>
                        <a href="{{route('perfil.index')}}" class="block px-4 py-2 text-sm text-white-700 hover:bg-white-100 ">Editar perfil</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="block px-4 py-2 text-sm text-white-700 hover:bg-white-100 " type="submit">
                                    Cerrar sesion
                                </button>
                            </form>
                        {{-- <a href="#" class="block px-4 py-2 text-sm text-white-700 hover:bg-white-100 ">Cerrar sesion</a> --}}
                        </li>
                    </ul>
                    </div>
                    @endauth
                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-white-500 rounded-lg md:hidden hover:bg-white-100 focus:outline-none focus:ring-2 focus:ring-white-200 " aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-white-100 rounded-lg bg-white-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white ">
                    <li>
                    <a href="{{route('home')}}" class="block py-2 pl-3 pr-4 text-white bg-purple-700 rounded md:bg-transparent md:text-purple-700 md:p-0 " aria-current="page">Inicio</a>
                    </li>
                    <li>
                    <a href="{{route('contact')}}" class="block py-2 pl-3 pr-4 text-white-900 rounded hover:bg-white-100 md:hover:bg-transparent md:hover:text-purple-700 md:p-0">Contacto</a>
                    </li>
                        @auth
                        <li>
                            <a href="{{route('explore')}}" class="block py-2 pl-3 pr-4 text-white-900 rounded hover:bg-white-100 md:hover:bg-transparent md:hover:text-purple-700 md:p-0">Explorar</a>
                        </li>
                        <li>
                            <a href="{{route('posts.create')}}" class="block py-2 pl-3 pr-4 text-white-900 rounded hover:bg-white-100 md:hover:bg-transparent md:hover:text-purple-700 md:p-0">Nueva publicacion</a>
                        </li>
                        @endauth
                        @guest
                        <li>
                            <a href="{{ route('register') }}" class="block py-2 pl-3 pr-4 text-white-900 rounded hover:bg-white-100 md:hover:bg-transparent md:hover:text-purple-700 md:p-0">Crea una cuenta</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="block py-2 pl-3 pr-4 text-white-900 rounded hover:bg-white-100 md:hover:bg-transparent md:hover:text-purple-700 md:p-0">Login</a>
                        </li>
                        @endguest
                </ul>
                </div>
                </div>
            </nav>
        </header>

        <main class="container mx-auto mt-5">
            <h2 class="font-black text-center text-3xl mb-5">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        {{-- <footer class="mt-10 text-center p-5 text-white-500 font-bold uppercase">
            GestionApp - Todos los derechos reservados {{ now()->year }}
        </footer> --}}
    </body>
</html>
