<h1>Crear receta</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST">
    @csrf

    <input type="text" name="nombre" placeholder="Nombre">

    <select name="tipo">
        <option value="entrada">Entrada</option>
        <option value="plato principal">Plato principal</option>
        <option value="postre">Postre</option>
    </select>

    <select name="dificultad">
        <option value="facil">Fácil</option>
        <option value="media">Media</option>
        <option value="dificil">Difícil</option>
    </select>

    <button type="submit">Guardar</button>
</form>

<a href="/">Volver</a>