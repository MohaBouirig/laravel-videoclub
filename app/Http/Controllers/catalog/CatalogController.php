<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CatalogController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getIndex() // mostrara el index de catalog
    {
        $movie = new Movie();

        return view('catalog.index', array('peliculas' => $movie->todasPeliculas()));
    }

    public function getShow($id)
    {
        $movie = new Movie();
        return view('catalog.show', array('pelicula' => $movie->mostrarPelicula($id)));
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function postCreate(Request $request)
    {
        $movie = new Movie();

        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;

        $movie->save();

        return view('catalog.show', array('pelicula' => $movie->mostrarPelicula($movie->id)));
        // return view('catalog.create');
    }

    public function getEdit($id)
    {
        $movie = new Movie();
        return view('catalog.edit', array('pelicula' => $movie->mostrarPelicula($id)));
    }

    public function putEdit(Request $request, $id)
    {
        $movie = new Movie();
        $movie = Movie::findOrFail($id);
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;
        $movie->save();
        return view('catalog.index', array('peliculas' => $movie->todasPeliculas()));
    }


    public function putRent($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->rented = true;
        $movie->save();

        return view('catalog.show', array('pelicula' => $movie->mostrarPelicula($id)));
    }

    public function putReturn($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->rented = false;
        $movie->save();

        return view('catalog.show', array('pelicula' => $movie->mostrarPelicula($id)));
    }

    public function deleteMovie($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return view('catalog.index', array('peliculas' => $movie->todasPeliculas()));
    }
}
