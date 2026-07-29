<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobse', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('department'); // Département
            $table->string('type');        // CDD, Stage, Volontariat...
            $table->string('deadline');    // Date limite
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobse');
    }
};