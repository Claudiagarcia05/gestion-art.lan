<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use App\Models\Articulo;
    use App\Models\User;

    class ArticuloSeeder extends Seeder {
        public function run(): void {
            $user = User::first();

            if ($user) {
                Articulo::firstOrCreate([
                    'titulo' => 'Artículo de ejemplo',
                ], [
                    'contenido' => 'Este es un contenido de ejemplo para el artículo.',
                    'user_id' => $user->id,
                    'fecha_publicacion' => now()->subDays(5),
                    'estado' => 'Publicado',
                    'secciones' => ['Portada', 'Interior'],
                ]);

                Articulo::firstOrCreate([
                    'titulo' => 'Otro artículo',
                ], [
                    'contenido' => 'Contenido del segundo artículo.',
                    'user_id' => $user->id,
                    'fecha_publicacion' => now()->addDays(3),
                    'estado' => 'Borrador',
                    'secciones' => ['Foros'],
                ]);
            }
        }
    }