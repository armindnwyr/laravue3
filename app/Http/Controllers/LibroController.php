<?php

namespace App\Http\Controllers;

use App\Http\Resources\LibroResource;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libro = LibroResource::collection(Libro::all());
        return Inertia::render('Libros/Index', compact('libro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Libros/Create');
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
            'titulo'=>'required',
            'autor'=>'required',
            'descripcion'=>'required',
            'enlace'=>'required',
            'image'=>'required',
        ]);

        if($request->hasFile('image')){
            $img = $request->file('image')->store('public/imagen');
            $image = Storage::url($img);

            $libro = new Libro();
    
            $libro->titulo = $request->titulo;
            $libro->autor = $request->autor;
            $libro->descripcion = $request->descripcion;
            $libro->enlace = $request->enlace;
            $libro->image = $image;
    
            $libro->save();
        }

        return Redirect::route('libros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        return Inertia::render('Libros/Edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo'=>'required',
            'autor'=>'required',
            'descripcion'=>'required',
            'enlace'=>'required',
        ]);


        if($request->hasFile('image')){
            $img = str_replace('storage','public', $libro->image);
            $img2 = $request->file('image')->store('public/imagen');
            $img3 = Storage::url($img2);
            Storage::delete($img);
            $libro->image = $img3;
        }

    
            $libro->titulo = $request->titulo;
            $libro->autor = $request->autor;
            $libro->descripcion = $request->descripcion;
            $libro->enlace = $request->enlace;
            
    
            $libro->save();


        return Redirect::route('libros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();

        return Redirect::route('libros.index');
    }
}
