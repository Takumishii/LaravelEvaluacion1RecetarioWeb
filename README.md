# LaravelEvaluacion1RecetarioWeb
Evaluacion 1 de la asignatura de desarrollo web con Laravel

## Funcionalidades

- Listado de recetas
- Filtro por tipo y dificultad
- Búsqueda por nombre
- Visualización de detalle
- Creación de recetas

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