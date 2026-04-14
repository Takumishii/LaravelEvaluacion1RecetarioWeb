<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recetario</title>
    <style>
        body { font-family: Arial; margin: 0; }

        nav {
            background: #333;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        nav a {
            color: white;
            margin-right: 10px;
            text-decoration: none;
        }

        footer {
            background: #eee;
            padding: 10px;
            text-align: center;
            margin-top: 30px;
        }

        .container {
            padding: 20px;
        }

        .search {
            display: flex;
            gap: 5px;
        }

        .search input {
            padding: 5px;
        }
    </style>
</head>
<body>

<nav>
    <div>
        <a href="{{ route('recetas.index') }}">Inicio</a>
        <a href="{{ route('recetas.index', ['tipo' => 'entrada']) }}">Entradas</a>
        <a href="{{ route('recetas.index', ['tipo' => 'plato principal']) }}">Platos</a>
        <a href="{{ route('recetas.index', ['tipo' => 'postre']) }}">Postres</a>
    </div>

    <form method="GET" action="{{ route('recetas.index') }}" class="search">
        <input type="text" name="buscar" placeholder="Buscar...">
    </form>
</nav>

<div class="container">
    @yield('content')
</div>

<footer>
    <p>🍽️ Recetario Laravel - Evaluación 1</p>
</footer>

</body>
</html>