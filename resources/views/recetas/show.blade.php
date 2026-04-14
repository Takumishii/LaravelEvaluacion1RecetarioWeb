@extends('layouts.app')

@section('content')

@if($receta)

    <h1>{{ $receta['nombre'] }}</h1>

    <img src="{{ asset($receta['imagen_url']) }}"
         alt="{{ $receta['nombre'] }}"
         style="width:300px;border-radius:10px;margin-bottom:15px;">

    <p><strong>Tipo:</strong> {{ $receta['tipo'] }}</p>
    <p><strong>Dificultad:</strong> {{ $receta['dificultad'] }}</p>
    <p><strong>Tiempo:</strong> {{ $receta['tiempo'] }}</p>

    <h3>Ingredientes:</h3>
    <ul>
        @foreach($receta['ingredientes'] as $ing)
            <li>{{ $ing }}</li>
        @endforeach
    </ul>

    <h3>Pasos:</h3>
    <ol>
        @foreach($receta['pasos'] as $paso)
            <li>
                Paso {{ $loop->iteration }}: {{ $paso }}
            </li>
        @endforeach
    </ol>

@else
    <p>Receta no encontrada</p>
@endif

<a href="{{ route('recetas.index') }}">Volver</a>

@endsection