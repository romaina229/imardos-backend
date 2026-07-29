<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_results', function (Blueprint $table) {
            // 1. Ajouter la nouvelle colonne pour le contenu des résultats
            $table->text('result_content')->nullable()->after('job_title');
            
            // 2. Supprimer les anciennes colonnes inutiles (avis)
            $table->dropColumn(['rating', 'comment']);
        });
    }

    public function down(): void
    {
        Schema::table('job_results', function (Blueprint $table) {
            // Restaurer les colonnes en cas de rollback
            $table->integer('rating')->nullable();
            $table->text('comment')->nullable();
            $table->dropColumn('result_content');
        });
    }
};