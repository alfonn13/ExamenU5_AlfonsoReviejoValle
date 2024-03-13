<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Personaje') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('personajes.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Back to Personajes</a>
            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-lg">
                <form action="{{ route('personajes.store') }}" method="POST" enctype="multipart/form-data" class="w-full max-w-lg mx-auto">
                    @csrf
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Oops! Something went wrong.</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="w-full mb-5">
                        <label for="raza" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Raza</label>
                        <select name="raza_id" id="raza" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            @foreach ($razas as $raza)
                                <option value="{{ $raza->id }}">{{ $raza->raza }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full mb-5">
                        <label for="nombre" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>
                    <div class="w-full mb-5">
                        <label for="clase" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Clase</label>
                        <input type="text" name="clase" id="clase" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>
                    <div class="w-full mb-5">
                        <label for="habilidad" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Habilidad</label>
                        <input type="habilidad" name="habilidad" id="price" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>
                    <div class="w-full mb-5">
                        <label for="imagen" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Foto</label>
                        <input type="file" name="imagen" id="imagen" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>
                    <div class="w-full mb-5">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Personaje</button>
                    </div>
                </form>
    </div>

</x-app-layout>