# LaravelEvaluacion1RecetarioWeb
Evaluación 1 de la asignatura de desarrollo web con Laravel

---

## Descripción del proyecto

Aplicación web desarrollada en Laravel que permite gestionar y explorar recetas de cocina sin uso de base de datos, utilizando arrays en el controlador.

Permite listar recetas, filtrarlas por tipo y dificultad, buscarlas por nombre, ver su detalle y crear nuevas recetas (sin persistencia).

---

## Instalación y configuración

### Comandos utilizados

```bash
composer create-project laravel/laravel recetario
cd recetario
php artisan serve
```

### Configuración relevante (.env)

```env
APP_NAME=Laravel
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000
```

### Evidencia

![Init](Docs/1.png)
![Servidor](Docs/2.png)
![Prueba1](Docs/3.png)
![Estructura](Docs/directorio.png)

---

## Nivel 2: Definición de rutas

| Método | URL            | Nombre            | Controlador@Método            |
|--------|----------------|------------------|-------------------------------|
| GET    | /              | recetas.index    | RecetarioController@index     |
| GET    | /recetas/{id}  | recetas.show     | RecetarioController@show      |
| GET    | /crear         | recetas.create   | RecetarioController@create    |
| POST   | /crear         | recetas.store    | RecetarioController@store     |
| GET    | /buscar        | recetas.buscar   | RecetarioController@buscar    |

---

## Nivel 3: Controlador y lógica de datos

### ¿Qué es un controlador en MVC?

El controlador es el encargado de recibir las solicitudes del usuario, procesar los datos y devolver una respuesta (vista). En este proyecto, el controlador maneja un array de recetas y aplica filtros y búsquedas.

---

### Búsqueda y filtrado combinado

```php
public function index(Request $request)
{
    $recetas = $this->recetas;

    if ($request->tipo) {
        $recetas = array_filter($recetas, fn($r) => $r['tipo'] == $request->tipo);
    }

    if ($request->dificultad) {
        $recetas = array_filter($recetas, fn($r) => $r['dificultad'] == $request->dificultad);
    }

    if ($request->buscar) {
        $recetas = array_filter($recetas, function ($r) use ($request) {
            return stripos($r['nombre'], $request->buscar) !== false;
        });
    }

    return view('recetas.index', compact('recetas'));
}
```

La búsqueda se combina con los filtros, por lo que una receta debe cumplir todas las condiciones para ser mostrada.

---

### Uso de `redirect()->with()`

Se utiliza para redirigir al usuario con un mensaje temporal.

```php
return redirect()->route('recetas.index')
    ->with('error', 'Receta no encontrada');
```

En la vista:

```blade
@if(session('error'))
    <div>{{ session('error') }}</div>
@endif
```

---

## Nivel 4: Vistas Blade

### Herencia de layout

Layout base:

```blade
<div class="container">
    @yield('content')
</div>
```

Vista hija:

```blade
@extends('layouts.app')

@section('content')
<h1>Recetas</h1>
@endsection
```

`@extends` conecta la vista con el layout y `@yield` define dónde se inserta el contenido.

---

### Uso de `@foreach` y `$loop`

```blade
@foreach($receta['pasos'] as $paso)
    <li>Paso {{ $loop->iteration }}: {{ $paso }}</li>
@endforeach
```

`$loop->iteration` permite numerar automáticamente cada elemento.

---

### Uso de `@include` y diferencia con `@component`

```blade
@include('recetas.partials.card', ['receta' => $receta])
```

`@include` inserta una vista pasando datos directamente.  
`@component` permite una estructura más flexible usando slots.

```blade
@component('recetas.partials.card')
    @slot('receta')
        {{ $receta }}
    @endslot
@endcomponent
```

---

### Ejemplo de `@foreach` anidado

```blade
@foreach($recetas as $receta)
    <h3>{{ $receta['nombre'] }}</h3>

    <ul>
        @foreach($receta['ingredientes'] as $ing)
            <li>{{ $ing }}</li>
        @endforeach
    </ul>
@endforeach
```