@if($receta)
    <h1>{{ $receta['nombre'] }}</h1>

    <p>Tipo: {{ $receta['tipo'] }}</p>
    <p>Dificultad: {{ $receta['dificultad'] }}</p>

    <h3>Ingredientes:</h3>
    <ul>
    @foreach($receta['ingredientes'] as $ing)
        <li>{{ $ing }}</li>
    @endforeach
    </ul>

    <h3>Pasos:</h3>
    <ol>
    @foreach($receta['pasos'] as $paso)
        <li>{{ $paso }}</li>
    @endforeach
    </ol>
@else
    <p>Receta no encontrada</p>
@endif

<a href="{{ route('recetas.index') }}">Volver</a>