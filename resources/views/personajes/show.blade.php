<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Personajes Details') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('personajes.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Back to Personajes</a>
            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-lg">
                <div class="px-4 py-2">
                    <h1 class="text-3xl font-bold mb-2">{{ $personaje->nombre }}</h1>
                    <p class="text-gray-600 text-sm">{{ $personaje->clase }}</p>
                    <p class="text-gray-600 text-sm">{{ $personaje->raza->raza }}</p>
                    <p class="text-gray-600 text-sm">{{ $personaje->habilidad }}</p>
                </div>
                <div class="px-4 py-2">
                <img src="{{ asset(Storage::url($personaje->imagen)) }}" alt="{{ $personaje->nombre }}" class="w-20 h-20 object-cover">
                </div>
            </div>
        </div>
    </div>

</x-app-layout>