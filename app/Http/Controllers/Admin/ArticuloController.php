<?php

    namespace App\Http\Controllers\Admin;

    use Illuminate\Routing\Controller;
    use App\Models\Articulo;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class ArticuloController extends Controller {
        public function __construct() {
            $this->middleware('auth');
        }

        public function index() {
            $articulos = Articulo::with('user')->latest()->get();

            return view('admin.articulos.index', compact('articulos'));
        }

        public function create() {

            return view('admin.articulos.create');
        }

        public function store(Request $request) {
            $validated = $request->validate([
                'titulo' => 'required|string|max:255',
                'contenido' => 'nullable|string',
                'fecha_publicacion' => 'required|date',
                'estado' => 'required|in:Cancelado,Borrador,Publicado',
                'secciones' => 'required|array|min:1',
                'secciones.*' => 'in:Portada,Interior,Foros'
            ]);

            $articulo = new Articulo($validated);
            $articulo->user_id = Auth::id();
            $articulo->save();

            return redirect()->route('admin.articulos.index')
                ->with('success', 'Artículo creado correctamente.');
        }

        public function edit($id) {
            $articulo = Articulo::findOrFail($id);

            return view('admin.articulos.edit', compact('articulo'));
        }

        public function update(Request $request, $id) {
            $articulo = Articulo::findOrFail($id);
            
            $validated = $request->validate([
                'titulo' => 'required|string|max:255',
                'contenido' => 'nullable|string',
                'fecha_publicacion' => 'required|date',
                'estado' => 'required|in:Cancelado,Borrador,Publicado',
                'secciones' => 'required|array|min:1',
                'secciones.*' => 'in:Portada,Interior,Foros'
            ]);

            $articulo->update($validated);

            return redirect()->route('admin.articulos.index')
                ->with('success', 'Artículo actualizado correctamente.');
        }

        public function destroy($id) {
            $articulo = Articulo::findOrFail($id);
            $articulo->delete();

            return redirect()->route('admin.articulos.index')
                ->with('success', 'Artículo eliminado correctamente.');
        }
    }