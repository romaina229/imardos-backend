<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('reviews', 'job_results');
    }

    public function down(): void
    {
        Schema::rename('job_results', 'reviews');
    }
};