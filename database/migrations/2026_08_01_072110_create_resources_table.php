<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category'); // Ex: Rapport annuel, Brochure, Document technique
            $table->string('file_url');  // Lien vers le fichier (PDF, Word, etc.) ou vers Google Drive
            $table->text('description')->nullable();
            $table->string('file_size')->nullable(); // Taille du fichier (ex: 2.4 Mo)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};