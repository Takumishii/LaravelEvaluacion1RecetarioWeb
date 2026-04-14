<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recetario</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: #f5f5f5;
        }

        /* NAVBAR */
        nav {
            background: #111F35;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            color: #F63049;
        }

        /* CONTENIDO */
        .container {
            padding: 20px;
        }

        /* BOTONES */
        button, a.button {
            background: #F63049;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        button:hover, a.button:hover {
            background: #D02752;
        }

        /* CARDS */
        .card {
            width: 250px;
            border-radius: 12px;
            overflow: hidden;
            background: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card-content {
            padding: 12px;
        }

        .card-content h3 {
            margin: 0;
            color: #111F35;
        }

        .card-content p {
            margin: 8px 0;
            color: #555;
        }

        /* ALERTAS */
        .success {
            background: #d1e7dd;
            padding: 10px;
            border-left: 5px solid #28a745;
            margin-bottom: 15px;
        }

        .error {
            background: #f8d7da;
            padding: 10px;
            border-left: 5px solid #F63049;
            margin-bottom: 15px;
        }

        /* FOOTER */
        footer {
            background: #111F35;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
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