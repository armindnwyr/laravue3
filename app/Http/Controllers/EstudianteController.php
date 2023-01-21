<?php

namespace App\Http\Controllers;

use App\Http\Resources\EstudianteResource;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiante = EstudianteResource::collection(Estudiante::all());
        return Inertia::render('Estudiantes/Index', compact('estudiante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return Inertia::render('Estudiantes/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:58',
            'paterno' => 'required|max:58',
            'materno' => 'required|max:58',
            'sexo' => 'required|',
            'codigo' => 'numeric|digits:6',
            'correo' => 'required|email',
        ]);

        $estudiante = new Estudiante();

        $estudiante->nombre = $request->nombre;
        $estudiante->paterno = $request->paterno;
        $estudiante->materno = $request->materno;
        $estudiante->sexo = $request->sexo;
        $estudiante->codigo = $request->codigo;
        $estudiante->correo = $request->correo;

        $estudiante->save();

        return Redirect::route('estudiantes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        return Inertia::render('Estudiantes/Edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre' => 'required|max:58',
            'paterno' => 'required|max:58',
            'materno' => 'required|max:58',
            'sexo' => 'required|',
            'codigo' => 'numeric|digits:6',
            'correo' => 'required|email',
        ]);

        $estudiante->nombre = $request->nombre;
        $estudiante->paterno = $request->paterno;
        $estudiante->materno = $request->materno;
        $estudiante->sexo = $request->sexo;
        $estudiante->codigo = $request->codigo;
        $estudiante->correo = $request->correo;

        $estudiante->save();

        return Redirect::route('estudiantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return Redirect::route('estudiantes.index');
    }
}
