<?php

namespace App\Http\Controllers;

use App\Models\Personaje;
use Illuminate\Http\Request;
use App\Models\Raza;
use Illuminate\Support\Facades\Storage;

class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personajes = Personaje::all();
        return view('personajes.index', compact('personajes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $razas = Raza::all();
        return view('personajes.create', compact('razas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated  = $request->validate([
            'nombre' => 'required',
            'clase' => 'required',
            'habilidad' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'raza_id' => 'required',
        ]);

        $validated['user_id'] = auth()->id();

        if($request->hasFile('imagen')) {
           $path = $request->file('imagen')->store('public/photos');
              $validated['imagen'] = $path;
            
        }

        Personaje::create($validated);

        return redirect()->route('personajes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personaje $personaje)
    {
        return view('personajes.show', compact('personaje'));   
    }

    /**
     * Show the form for editing the specified resource.
     */
   

    public function edit(String $id)
    {
        $personaje = Personaje::findOrFail($id);
        $razas = Raza::all();
        return view('personajes.edit', compact('personaje', 'razas'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $personaje= Personaje::findOrfail($id);

        $validated  = $request->validate([
            'nombre' => 'required',
            'clase' => 'required',
            'habilidad' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'raza_id' => 'required',
        ]);

        if($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/photos');
            Storage::delete($personaje->imagen);
            $validated['imagen'] = $path;
        }

        $personaje->update($validated);

        return redirect()->route('personajes.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $personaje = Personaje::findOrfail($id);
        Storage::delete($personaje->imagen);
        $personaje->delete();

        return redirect()->route('personajes.index');
    }

    public function mispersonajes()
    {
        $personajes = Personaje::where('user_id', auth()->id())->get();
        return view('personajes.mispersonajes', compact('personajes'));
    }
}
