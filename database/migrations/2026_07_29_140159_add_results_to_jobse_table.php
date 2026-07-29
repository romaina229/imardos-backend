<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jobse', function (Blueprint $table) {
            $table->text('results')->nullable()->after('deadline'); // Pour stocker les résultats
        });
    }

    public function down(): void
    {
        Schema::table('jobse', function (Blueprint $table) {
            $table->dropColumn('results');
        });
    }
};