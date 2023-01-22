<?php

namespace App\Http\Controllers;

use App\Http\Resources\InformeResource;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Informe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informe = InformeResource::collection(Informe::with('docente','estudiante')->get());
        return Inertia::render('Informes/Index', compact('informe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();
        return inertia::render('Informes/Create', compact('docentes','estudiantes'));
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
            'nombre'=>'required',
            'descripcion'=>'required',
            'categoria'=>'required',
            'pdf'=>'required',
            'image'=>'required',
            'fecha'=>'required',
            'centro'=>'required',
            'docente'=>'required',
            'estudiante'=>'required',
        ]);

        if ($request->hasFile('pdf','image')) {
            $pdf = $request->file('pdf','image')->store('public/documento');
            $img = $request->file('image')->store('public/imagen');
            $url = Storage::url($pdf);
            $image = Storage::url($img);
            $informe = new Informe();
            $informe->nombre = $request->nombre;
            $informe->descripcion = $request->descripcion;
            $informe->centro = $request->centro;
            $informe->pdf = $url;
            $informe->image = $image;
            $informe->docente_id = $request->docente;
            $informe->estudiante_id = $request->estudiante;
            $informe->fecha = $request->fecha;
            $informe->save();
        }
        return Redirect::route('informes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function show(Informe $informe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function edit(Informe $informe)
    {
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();
        return Inertia::render('Informes/Edit', compact('informe','docentes','estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informe $informe)
    {
        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required',
            'categoria'=>'required',
            'pdf'=>'required',
            'fecha'=>'required',
            'centro'=>'required',
            'docente'=>'required',
            'estudiante'=>'required',
        ]);

        if ($request->hasFile('pdf')) {
            $url = str_replace('storage','public', $informe->pdf);
            $pdf = $request->file('pdf')->store('public/documento');
            $url2 = Storage::url($pdf);
            Storage::delete($url);
            $informe->pdf = $url2;

        }else if($request->hasFile('image')){
            $img = str_replace('storage','public', $informe->image);
            $img2 = $request->file('image')->store('public/imagen');
            $img3 = Storage::url($img2);
            Storage::delete($img);
            $informe->image = $img3;
        }

        $informe->nombre = $request->nombre;
        $informe->descripcion = $request->descripcion;
        $informe->centro = $request->centro;
        $informe->docente_id = $request->docente;
        $informe->estudiante_id = $request->estudiante;
        $informe->fecha = $request->fecha;
        $informe->save();


        return Redirect::route('informes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informe $informe)
    {

        // Delete pdf
        $url = str_replace('storage','public', $informe->pdf);
        Storage::delete($url);

        // Delete image
        $img = str_replace('storage','public', $informe->image);
        Storage::delete($img);

        $informe->delete();

        return Redirect::route('informes.index');
    }
}
