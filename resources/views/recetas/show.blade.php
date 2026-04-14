@extends('layouts.app')

@section('content')

<div style="max-width:800px;margin:auto;background:white;padding:20px;border-radius:12px;box-shadow:0 4px 10px rgba(0,0,0,0.1);">

    <h1 style="color:#111F35;">{{ $receta['nombre'] ?? 'Sin nombre' }}</h1>

    <img src="{{ asset($receta['imagen_url'] ?? 'images/default.jpg') }}"
         style="width:100%;border-radius:10px;margin:15px 0;">

    <p>
        <strong>Tipo:</strong> 
        {{ data_get($receta, 'tipo', 'No definido') }}
    </p>

    @php
        $dificultad = data_get($receta, 'dificultad', 'No definida');

        $color = match($dificultad) {
            'facil' => 'green',
            'media' => 'orange',
            'dificil' => 'red',
            default => 'gray'
        };
    @endphp

    <p>
        <strong>Dificultad:</strong> 
        <span style="color:{{ $color }};font-weight:bold;">
            {{ $dificultad }}
        </span>
    </p>

    <p>
        <strong>Tiempo:</strong> 
        {{ data_get($receta, 'tiempo', 'No especificado') }}
    </p>

    <hr>

    <h3 style="color:#8A244B;">Ingredientes</h3>
    <ul>
        @foreach(data_get($receta, 'ingredientes', []) as $ing)
            <li>{{ $ing }}</li>
        @endforeach
    </ul>

    <h3 style="color:#8A244B;">Pasos</h3>
    <ol>
        @foreach(data_get($receta, 'pasos', []) as $paso)
            <li>Paso {{ $loop->iteration }}: {{ $paso }}</li>
        @endforeach
    </ol>

    <a href="{{ route('recetas.index') }}" 
       class="button" 
       style="margin-top:15px;display:inline-block;">
        Volver
    </a>

</div>

@endsection