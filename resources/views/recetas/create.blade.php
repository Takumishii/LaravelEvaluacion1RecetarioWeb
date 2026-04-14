@extends('layouts.app')

@section('content')

<div style="max-width:500px;margin:auto;background:white;padding:20px;border-radius:12px;box-shadow:0 4px 10px rgba(0,0,0,0.1);">

    <h1 style="color:#111F35;">Crear receta</h1>

    <form method="POST" action="{{ route('recetas.store') }}">
        @csrf

        {{-- NOMBRE --}}
        <div style="margin-bottom:15px;">
            <label>Nombre</label><br>
            <input 
                type="text" 
                name="nombre" 
                value="{{ old('nombre') }}"
                style="width:100%;padding:8px;border-radius:5px;
                border:1px solid {{ $errors->has('nombre') ? '#F63049' : '#ccc' }};">
            
            @error('nombre')
                <small style="color:#F63049;">{{ $message }}</small>
            @enderror
        </div>

        {{-- TIPO --}}
        <div style="margin-bottom:15px;">
            <label>Tipo</label><br>
            <select 
                name="tipo" 
                style="width:100%;padding:8px;border-radius:5px;
                border:1px solid {{ $errors->has('tipo') ? '#F63049' : '#ccc' }};">
                
                <option value="">Seleccione</option>
                <option value="entrada" {{ old('tipo') == 'entrada' ? 'selected' : '' }}>Entrada</option>
                <option value="plato principal" {{ old('tipo') == 'plato principal' ? 'selected' : '' }}>Plato principal</option>
                <option value="postre" {{ old('tipo') == 'postre' ? 'selected' : '' }}>Postre</option>
            </select>

            @error('tipo')
                <small style="color:#F63049;">{{ $message }}</small>
            @enderror
        </div>

        {{-- DIFICULTAD --}}
        <div style="margin-bottom:15px;">
            <label>Dificultad</label><br>
            <select 
                name="dificultad" 
                style="width:100%;padding:8px;border-radius:5px;
                border:1px solid {{ $errors->has('dificultad') ? '#F63049' : '#ccc' }};">
                
                <option value="">Seleccione</option>
                <option value="facil" {{ old('dificultad') == 'facil' ? 'selected' : '' }}>Fácil</option>
                <option value="media" {{ old('dificultad') == 'media' ? 'selected' : '' }}>Media</option>
                <option value="dificil" {{ old('dificultad') == 'dificil' ? 'selected' : '' }}>Difícil</option>
            </select>

            @error('dificultad')
                <small style="color:#F63049;">{{ $message }}</small>
            @enderror
        </div>

        {{-- BOTÓN --}}
        <button 
            type="submit" 
            style="width:100%;background:#F63049;color:white;border:none;padding:10px;border-radius:5px;">
            Guardar receta
        </button>

    </form>

</div>

@endsection