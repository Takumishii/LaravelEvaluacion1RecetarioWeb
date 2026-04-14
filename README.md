# LaravelEvaluacion1RecetarioWeb
Evaluacion 1 de la asignatura de desarrollo web con Laravel

## Funcionalidades

- Listado de recetas
- Filtro por tipo y dificultad
- Búsqueda por nombre
- Visualización de detalle
- Creación de recetas (sin persistencia)

##  Inicialización

![Init](Docs/1.png)

## Servidor activo

![Servidor](Docs/2.png)

## Primera Prueba

![Prueba1](Docs/3.png)

## Árbol de directorios

![Estructura](Docs/directorio.png)

## Rutas de la aplicación

| Método | URL            | Nombre            | Controlador@Método            |
|--------|----------------|------------------|-------------------------------|
| GET    | /              | recetas.index    | RecetarioController@index     |
| GET    | /recetas/{id}  | recetas.show     | RecetarioController@show      |
| GET    | /crear         | recetas.create   | RecetarioController@create    |
| POST   | /crear         | recetas.store    | RecetarioController@store     |
| GET    | /buscar        | recetas.buscar   | RecetarioController@buscar    |


## Lógica de búsqueda y filtrado combinado

En este proyecto se implementa un sistema de búsqueda y filtrado de recetas utilizando un array asociativo en el controlador, sin uso de base de datos.

El sistema permite combinar:
- Búsqueda por nombre de receta
- Filtro por tipo de comida
- Filtro por nivel de dificultad

Estos filtros pueden usarse de forma individual o combinada mediante parámetros GET en la URL.

---

### Fragmento de código

```php
public function index(Request $request)
{
    $recetas = $this->recetas;

    if ($request->tipo) {
        $recetas = array_filter($recetas, function ($r) use ($request) {
            return $r['tipo'] == $request->tipo;
        });
    }

    if ($request->dificultad) {
        $recetas = array_filter($recetas, function ($r) use ($request) {
            return $r['dificultad'] == $request->dificultad;
        });
    }

    if ($request->buscar) {
        $recetas = array_filter($recetas, function ($r) use ($request) {
            return stripos($r['nombre'], $request->buscar) !== false;
        });
    }

    return view('recetas.index', compact('recetas'));
}

```´

---

### Explicación del funcionamiento

El sistema parte de un array base de recetas y aplica filtros de forma secuencial:

- **Filtro por tipo:** compara el valor del parámetro `tipo` con el campo `tipo` de cada receta.
- **Filtro por dificultad:** compara el nivel de dificultad seleccionado con cada receta.
- **Búsqueda por nombre:** utiliza `stripos()` para encontrar coincidencias parciales sin distinguir mayúsculas o minúsculas.

Los filtros se aplican de manera acumulativa, lo que permite combinarlos entre sí. Esto significa que una receta debe cumplir simultáneamente todos los criterios enviados en la URL para ser mostrada.

---

### Ejemplo de uso

```txt
/?buscar=choclo&tipo=plato principal&dificultad=media

Esto devuelve únicamente las recetas que cumplen todos los filtros al mismo tiempo.