<div class="card">

    <img src="{{ asset($receta['imagen_url']) }}" alt="{{ $receta['nombre'] }}">

    <div class="card-content">

        <h3>{{ $receta['nombre'] }}</h3>

        <p>
            🍽️ {{ $receta['tipo'] }} <br>
            ⏱️ {{ $receta['tiempo'] }} <br>
            ⭐ {{ $receta['dificultad'] }}
        </p>

        <a href="{{ route('recetas.show', $receta['id']) }}" class="button">
            Ver receta
        </a>

    </div>

</div>