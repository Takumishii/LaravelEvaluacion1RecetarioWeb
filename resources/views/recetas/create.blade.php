@extends('layouts.app')

@section('content')

<h1>Crear receta</h1>

<form method="POST" action="{{ route('recetas.store') }}">
    @csrf

    {{-- NOMBRE --}}
    <div>
        <input 
            type="text" 
            name="nombre" 
            placeholder="Nombre"
            value="{{ old('nombre') }}"
            class="{{ $errors->has('nombre') ? 'error' : '' }}"
        >

        @error('nombre')
            <p class="error-text">{{ $message }}</p>
        @enderror
    </div>

    <br>

    {{-- TIPO --}}
    <div>
        <select 
            name="tipo"
            class="{{ $errors->has('tipo') ? 'error' : '' }}"
        >
            <option value="">Seleccione tipo</option>
            <option value="entrada">Entrada</option>
            <option value="plato principal">Plato principal</option>
            <option value="postre">Postre</option>
        </select>

        @error('tipo')
            <p class="error-text">{{ $message }}</p>
        @enderror
    </div>

    <br>

    {{-- DIFICULTAD --}}
    <div>
        <select 
            name="dificultad"
            class="{{ $errors->has('dificultad') ? 'error' : '' }}"
        >
            <option value="">Seleccione dificultad</option>
            <option value="facil">Fácil</option>
            <option value="media">Media</option>
            <option value="dificil">Difícil</option>
        </select>

        @error('dificultad')
            <p class="error-text">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <button type="submit">Guardar</button>
</form>

@endsection