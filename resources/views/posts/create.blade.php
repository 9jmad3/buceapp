@extends('layout.app')

@section('titulo')
    Crea una nueva Publicación
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">
                        Título
                    </label>
                    <input
                        id="title"
                        name="title"
                        type="text"
                        placeholder="Aquí el título"
                        class="border p-3 w-full rounded-l
                            @error('title')
                                border-red-500 rounded-lg
                            @enderror"
                        value={{old('title')}}>
                </div>
                @error('title')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea
                        id="description"
                        name="description"
                        type="text"
                        placeholder="Aquí la descripción"
                        class="border p-3 w-full rounded-l
                            @error('description')
                                border-red-500 rounded-lg
                            @enderror">
                    {{old('description')}}
                    </textarea>
                </div>
                @error('description')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>
                @enderror

                <div class="mb-5">
                    <input
                        type="hidden"
                        name="image"
                        value="{{old('image')}}">
                </div>
                @error('image')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>
                @enderror

                <input
                    type="submit"
                    value="Publicar"
                    class="bg-purple-400 hover:bg-purple-500 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
