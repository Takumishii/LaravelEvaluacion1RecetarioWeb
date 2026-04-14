<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetarioController extends Controller
{
private $recetas = [
    [   "id" => 1,
        "nombre" => "Ensalada Chilena",
        "slug" => "ensalada-chilena",
        "tipo" => "entrada",
        "dificultad" => "facil",
        "tiempo" => "10 min",
        "imagen_url" => "imagenes/ensalada_chilena.jpg",
        "ingredientes" => ["Tomates maduros", "Cebolla pluma", "Cilantro fresco", "Aceite de maravilla", "Sal"],
        "pasos" => [
            "Pelar los tomates y cortarlos en gajos",
            "Cortar la cebolla en pluma fina y amortiguarla con sal o azúcar",
            "Lavar la cebolla y escurrirla bien",
            "Mezclar el tomate con la cebolla, agregar cilantro picado, aceite y sal al gusto"
        ]
    ],
    [
        "id" => 2,
        "nombre" => "Empanaditas de Pino",
        "slug" => "empanaditas-pino",
        "tipo" => "entrada",
        "dificultad" => "media",
        "tiempo" => "60 min",
        "imagen_url" => "imagenes/empanadas_de_pino.jpg",
        "ingredientes" => ["Harina", "Carne picada", "Cebolla", "Manteca", "Huevo duro", "Aceitunas"],
        "pasos" => [
            "Preparar un pino con carne, cebolla y aliños el día anterior",
            "Hacer una masa con harina, sal, agua tibia y manteca derretida",
            "Estirar la masa, cortar círculos y rellenar con pino, huevo y aceituna",
            "Cerrar con dobleces y hornear a fuego alto hasta que doren"
        ]
    ],
    [
        "id" => 3,
        "nombre" => "Pastel de Choclo",
        "slug"=> "pastel-choclo",
        "tipo" => "plato principal",
        "dificultad" => "dificil",
        "tiempo" => "90 min",
        "imagen_url" => "imagenes/pastel_de_choclo.jpg",
        "ingredientes" => ["Choclo molido", "Albahaca", "Pino de carne", "Pollo cocido", "Huevo duro", "Aceitunas", "Azúcar"],
        "pasos" => [
            "Cocinar el choclo molido con albahaca y un poco de leche hasta espesar",
            "En una fuente de greda, poner una base de pino de carne, una presa de pollo, huevo y aceituna",
            "Cubrir con la mezcla de choclo",
            "Espolvorear azúcar encima y hornear hasta dorar"
        ]
    ],
    [
        "id" => 4,
        "nombre" => "Charquicán",
        "slug"=> "charquican",
        "tipo" => "plato principal",
        "dificultad" => "media",
        "tiempo" => "45 min",
        "imagen_url" => "imagenes/charquican.jpg",
        "ingredientes" => ["Papas", "Zapallo", "Carne picada", "Cebolla", "Choclo", "Arvejas", "Huevo frito"],
        "pasos" => [
            "Hacer un sofrito de cebolla con carne y aliños (ají de color, comino)",
            "Agregar papas y zapallo en cubos, cubrir con agua y cocinar",
            "Cuando estén blandos, moler groseramente con un mazo",
            "Incorporar choclo y arvejas cocidas. Servir con un huevo frito encima"
        ]
    ],
    [
        "id" => 5,
        "nombre" => "Mote con Huesillos",
        "slug"=> "mote-con-huesillos",
        "tipo" => "postre",
        "dificultad" => "facil",
        "tiempo" => "30 min (+ reposo)",
        "imagen_url" => "imagenes/mote_con_huesillos.jpg",
        "ingredientes" => ["Duraznos deshidratados (huesillos)", "Trigo mote", "Chancaca o azúcar", "Canela", "Cáscara de naranja"],
        "pasos" => [
            "Remojar los huesillos desde la noche anterior",
            "Cocinarlos en el agua de remojo con chancaca, canela y cáscara de naranja hasta que estén blandos",
            "Cocer el mote aparte en agua hirviendo hasta que esté tierno",
            "Servir bien helado en un vaso: dos huesillos, abundante jugo y una base de mote"
        ]
    ],
    [
        "id" => 6,
        "nombre" => "Leche Asada",
        "slug"=> "leche-asada",
        "tipo" => "postre",
        "dificultad" => "media",
        "tiempo" => "50 min",
        "imagen_url" => "imagenes/leche_asada.jpg",
        "ingredientes" => ["Leche entera", "Huevos", "Azúcar", "Esencia de vainilla"],
        "pasos" => [
            "Hacer un caramelo con azúcar en un molde",
            "Batir ligeramente los huevos con el azúcar, la leche y la vainilla",
            "Verter la mezcla en el molde con caramelo",
            "Hornear a temperatura media hasta que la superficie esté dorada y la mezcla cuajada"
        ]
    ],
    [
        "id" => 7,
        "nombre" => "Porotos Granados",
        "slug"=> "porotos-granados",
        "tipo" => "plato principal",
        "dificultad" => "media",
        "tiempo" => "60 min",
        "imagen_url" => "imagenes/porotos_granados.jpg",
        "ingredientes" => ["Porotos", "Zapallo", "Choclo", "Cebolla", "Albahaca"],
        "pasos" => [
            "Cocer los porotos hasta que estén blandos",
            "Agregar zapallo y cocinar",
            "Incorporar choclo y aliños",
            "Servir caliente"
        ]
    ],
    [
        "id" => 8,
        "nombre" => "Humitas",
        "slug"=> "humitas",
        "tipo" => "entrada",
        "dificultad" => "media",
        "tiempo" => "70 min",
        "imagen_url" => "imagenes/humitas.jpg",
        "ingredientes" => ["Choclo", "Cebolla", "Albahaca", "Manteca", "Ají de color"],
        "pasos" => [
            "Moler el choclo",
            "Hacer sofrito con cebolla y mezclar",
            "Envolver en hojas de choclo",
            "Cocinar en agua hirviendo"
        ]
    ]

];

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
    public function show($id)
    {
        $receta = collect($this->recetas)->firstWhere('id', $id);

        if (!$receta) {
            return redirect()
                ->route('recetas.index')
                ->with('error', 'La receta no existe');
        }

        return view('recetas.show', compact('receta'));
    }

        public function create()
    {
        return view('recetas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3',
            'tipo' => 'required',
            'dificultad' => 'required',
        ]);

        return redirect()->route('recetas.index')->with('success', 'Receta creada (simulada)');
    }

    public function buscar(Request $request)
{
    $recetas = $this->recetas;

    if ($request->buscar) {
        $recetas = array_filter($recetas, function ($r) use ($request) {
            return stripos($r['nombre'], $request->buscar) !== false;
        });
    }
    if ($request->tipo) {
        $recetas = array_filter($recetas, fn($r) => $r['tipo'] == $request->tipo);
    }

    if ($request->dificultad) {
        $recetas = array_filter($recetas, fn($r) => $r['dificultad'] == $request->dificultad);
    }

    return view('recetas.index', compact('recetas'));
}
}

