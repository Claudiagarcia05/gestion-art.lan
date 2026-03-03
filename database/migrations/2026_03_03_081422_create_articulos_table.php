<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('articulos', function (Blueprint $table) {
                $table->id();
                $table->string('titulo');
                $table->text('contenido')->nullable();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->date('fecha_publicacion');
                $table->enum('estado', ['Cancelado', 'Borrador', 'Publicado']);
                $table->json('secciones');
                $table->timestamps();
            });
        }

        public function down(): void {
            Schema::dropIfExists('articulos');
        }
    };