<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class APICatalogController extends Controller
{
    public function index()
    {
        return response()->json(Movie::all());
    }

    public function show($id)
    {
        return response()->json(Movie::findOrFail($id));
    }

    public function store(Request $request)
    {
        $movie = new Movie();

        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;

        $movie->save();
        return response()->json(Movie::findOrFail($movie->id));
    }

    public function update(Request $request, $id)
    {
        $movie = new Movie();
        $movie = Movie::findOrFail($id);
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;
        $movie->save();
        return response()->json(Movie::findOrFail($movie->id));
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return response()->json(['error' => false, 'msg' => 'La película se ha eliminado']);
    }

    public function putRent($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->rented = true;
        $movie->save();
        return response()->json(['error' => false, 'msg' => 'La película se ha marcado como alquilada']);
    }

    public function putReturn($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->rented = false;
        $movie->save();
        return response()->json(['error' => false, 'msg' => 'La película se ha marcado como devuelta']);
    }
}
