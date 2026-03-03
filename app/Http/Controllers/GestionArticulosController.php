<?php

    namespace App\Http\Controllers;

    use App\Models\Articulo;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class GestionArticulosController extends Controller {

        public function index() {
            $articulos = Articulo::with('user')->latest()->get();

            return view('gestion.index', compact('articulos'));
        }

        public function create() {

            return view('gestion.create');
        }

        public function store(Request $request) {
            $request->validate([
                'titulo' => 'required|string|max:255',
                'contenido' => 'nullable|string',
                'fecha_publicacion' => 'required|date',
                'estado' => 'required|in:Cancelado,Borrador,Publicado',
                'secciones' => 'required|array|min:1',
            ]);

            $articulo = new Articulo();
            $articulo->titulo = $request->titulo;
            $articulo->contenido = $request->contenido;
            $articulo->user_id = Auth::id();
            $articulo->fecha_publicacion = $request->fecha_publicacion;
            $articulo->estado = $request->estado;
            $articulo->secciones = $request->secciones;
            $articulo->save();

            return redirect()->route('gestion.index')->with('success');
        }

        public function edit($id) {
            $articulo = Articulo::findOrFail($id);

            return view('gestion.edit', compact('articulo'));
        }

        public function update(Request $request, $id) {
            $articulo = Articulo::findOrFail($id);
            
            $request->validate([
                'titulo' => 'required|string|max:255',
                'contenido' => 'nullable|string',
                'fecha_publicacion' => 'required|date',
                'estado' => 'required|in:Cancelado,Borrador,Publicado',
                'secciones' => 'required|array|min:1',
            ]);

            $articulo->titulo = $request->titulo;
            $articulo->contenido = $request->contenido;
            $articulo->fecha_publicacion = $request->fecha_publicacion;
            $articulo->estado = $request->estado;
            $articulo->secciones = $request->secciones;
            $articulo->save();

            return redirect()->route('gestion.index')->with('success');
        }

        public function destroy($id) {
            $articulo = Articulo::findOrFail($id);
            $articulo->delete();
            
            return redirect()->route('gestion.index')->with('success');
        }

        public function show($id) {
            $articulo = Articulo::findOrFail($id);

            return view('gestion.show', compact('articulo'));
        }
    }