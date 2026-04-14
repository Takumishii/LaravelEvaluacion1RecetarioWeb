@extends('layouts.app')

@section('content')

<h1>Crear receta</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('recetas.store') }}">
    @csrf

    <input type="text" name="nombre" placeholder="Nombre"><br><br>

    <select name="tipo">
        <option value="entrada">Entrada</option>
        <option value="plato principal">Plato principal</option>
        <option value="postre">Postre</option>
    </select><br><br>

    <select name="dificultad">
        <option value="facil">Fácil</option>
        <option value="media">Media</option>
        <option value="dificil">Difícil</option>
    </select><br><br>

    <button type="submit">Guardar</button>
</form>

@endsection