<h1>Recetas</h1>

<form method="GET" action="{{ route('recetas.index') }}">
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

<a href="{{ route('recetas.create') }}">Crear receta</a>

<ul>
@foreach($recetas as $receta)
    <li>
        <a href="{{ route('recetas.show', $receta['id']) }}">
            {{ $receta['nombre'] }}
        </a>
    </li>
@endforeach
</ul>