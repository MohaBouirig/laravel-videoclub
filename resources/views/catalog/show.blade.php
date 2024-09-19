@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-sm-4">
            <img src="{{ $pelicula->poster }}" style="height:400px" />
        </div>
        <div class="col-sm-8">
            <h2>{{ $pelicula->title }}</h2>

            <h6> Año: {{ $pelicula->year }}</h6>

            <h6>Director: {{ $pelicula->director }}</h6>

            <p><strong>Resumen:</strong> {{ $pelicula->synopsis }}</p>

            @if ($pelicula['rented'])
                <p><strong>Estado:</strong> Película actualmente alquilada.</p> <br>
                <form action=" {{ url('/catalog/return/' . $pelicula->id) }} " method="POST">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-danger"> Devolver película </button>
                </form>
            @else
                <p><strong>Estado:</strong> Película disponible</p> <br>
                <form action=" {{ url('/catalog/rent/' . $pelicula->id) }} " method="POST">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-success"> Alquilar película </button>
                </form>
            @endif

            <form action=" {{ url('/catalog/delete/' . $pelicula->id) }} " method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger"> Eliminar película </button>
            </form>

	    <button type="button" class="btn btn-warning">
                <i class="bi bi-pencil-fill"></i> <a href="{{ url('/catalog/edit/' . ($pelicula->id)) }}"> Editar Pelicula
            </button>

            <button type="button" class="btn btn-light">
                <i class="bi bi-arrow-left-short"></i> <a href="{{ url('/catalog') }}"> Volver al listado
            </button>

        </div>
    </div>
@stop