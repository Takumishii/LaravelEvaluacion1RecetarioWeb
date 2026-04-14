@extends('layouts.app')

@section('content')

<h1 style="color:#111F35;">Recetas 🍽️</h1>

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

<div class="row g-4">

@foreach($recetas as $receta)
    <div class="col-md-3">
        @include('recetas.partials.card', ['receta' => $receta])
    </div>
@endforeach

</div>

</div>

@endsection