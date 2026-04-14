<div style="
    width:250px;
    border:1px solid #ddd;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 2px 8px rgba(0,0,0,0.1);
">

    <img src="{{ asset($receta['imagen_url']) }}"
         alt="{{ $receta['nombre'] }}"
         style="width:100%;height:150px;object-fit:cover;">

    <div style="padding:10px;">

        <h3 style="margin:0;">{{ $receta['nombre'] }}</h3>

        <p style="margin:5px 0;">
            🍽️ {{ $receta['tipo'] }} <br>
            ⏱️ {{ $receta['tiempo'] }} <br>
            ⭐ {{ $receta['dificultad'] }}
        </p>

        <a href="{{ route('recetas.show', $receta['id']) }}"
           style="display:inline-block;margin-top:10px;padding:5px 10px;background:#007bff;color:white;border-radius:5px;text-decoration:none;">
            Ver receta
        </a>

    </div>
</div>