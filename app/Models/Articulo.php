<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Articulo extends Model {
        use HasFactory;

        protected $fillable = [
            'titulo',
            'contenido',
            'user_id',
            'fecha_publicacion',
            'estado',
            'secciones'
        ];

        protected $casts = [
            'secciones' => 'array',
            'fecha_publicacion' => 'date'
        ];

        public function user() {

            return $this->belongsTo(User::class);
        }

        public function fechaPublicacionPasada() {
            
            return $this->fecha_publicacion->isPast();
        }
    }