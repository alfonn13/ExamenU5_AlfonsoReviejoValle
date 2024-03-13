<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Personajes') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('personajes.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Personaje</a>
            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-lg">
                @if ($personajes->count())
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">Foto</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Clase</th>
                                <th class="px-4 py-2">Raza</th>
                                <th class="px-4 py-2">Habilidad</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personajes as $personaje)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">
                                        @if ($personaje->imagen)
                                            <img src="{{ asset(Storage::url($personaje->imagen)) }}" alt="{{ $personaje->nombre }}" class="w-20 h-20 object-cover">
                                        @else
                                            <p class="text-gray-900">No picture</p>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">{{ $personaje->nombre }}</td>
                                    <td class="border px-4 py-2">{{ $personaje->clase }}</td>
                                    <td class="border px-4 py-2">{{ $personaje->raza->raza }}</td>
                                    <td class="border px-4 py-2">{{ $personaje->habilidad }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('personajes.show', $personaje->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                                        <a href="{{ route('personajes.edit', $personaje->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold
                                            py-2 px-4 rounded">Edit</a>
                                        <form action="{{ route('personajes.destroy', $personaje->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No Personajes.</p>
                @endif
                
    </div>

</x-app-layout>