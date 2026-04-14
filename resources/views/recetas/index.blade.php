@extends('layouts.app')

@section('content')

<h1 style="margin-bottom: 20px;">Recetas 🍽️</h1>

@if(session('success'))
    <div style="background:#d1e7dd;padding:10px;margin-bottom:15px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background:#f8d7da;padding:10px;margin-bottom:10px;">
        {{ session('error') }}
    </div>
@endif

<form method="GET" action="{{ route('recetas.index') }}" style="margin-bottom: 20px;">
    <input type="text" name="buscar" placeholder="Buscar receta...">

    <select name="tipo">
        <option value="">Tipo</option>
        <option value="entrada">Entrada</option>
        <option value="plato principal">Plato principal</option>
        <option value="postre">Postre</option>
    </select>

    <select name="dificultad">
        <option value="">Dificultad</option>
        <option value="facil">Fácil</option>
        <option value="media">Media</option>
        <option value="dificil">Difícil</option>
    </select>

    <button type="submit">Filtrar</button>
</form>

<a href="{{ route('recetas.create') }}">➕ Crear receta</a>

<hr>

<div style="display:flex;flex-wrap:wrap;gap:20px;">

@foreach($recetas as $receta)
    <div style="
        width:250px;
        border:1px solid #ddd;
        border-radius:10px;
        overflow:hidden;
        box-shadow:0 2px 8px rgba(0,0,0,0.1);
    ">

        <img src="{{ asset($receta['imagen_url']) }}"
             alt="{{ $receta['nombre'] }}"
             style="width:100%;height:150px;object-fit:cover;">

        <div style="padding:10px;">

            <h3 style="margin:0;">{{ $receta['nombre'] }}</h3>

            <p style="margin:5px 0;">
                🍽️ {{ $receta['tipo'] }} <br>
                ⭐ {{ $receta['dificultad'] }}
            </p>

            <a href="{{ route('recetas.show', $receta['id']) }}"
               style="display:inline-block;margin-top:10px;padding:5px 10px;background:#007bff;color:white;border-radius:5px;text-decoration:none;">
                Ver receta
            </a>

        </div>
    </div>
@endforeach

</div>

@endsection