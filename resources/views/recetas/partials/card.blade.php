<div class="card h-100 shadow-sm">

    <img src="{{ asset($receta['imagen_url']) }}"
         class="card-img-top"
         style="height:160px;object-fit:cover;">

    <div class="card-body d-flex flex-column">

        <h5 class="card-title">{{ $receta['nombre'] }}</h5>

        <p class="card-text small text-muted">
            🍽️ {{ $receta['tipo'] }} <br>
            ⏱️ {{ $receta['tiempo'] }} <br>
            ⭐ {{ $receta['dificultad'] }}
        </p>

        <a href="{{ route('recetas.show', $receta['id']) }}"
           class="btn mt-auto text-white"
           style="background:#F63049;">
            Ver receta
        </a>

    </div>

</div>