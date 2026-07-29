<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('donor_name')->nullable();       // Nom du donateur
            $table->string('donor_email')->nullable();      // Email
            $table->string('phone')->nullable();            // Téléphone (pour Mobile Money)
            $table->decimal('amount', 10, 2);               // Montant (ex: 5000.00)
            $table->string('currency')->default('XOF');     // Devise (XOF, EUR, USD)
            $table->string('payment_method');               // fedapay, kkiapay, orange_money, moov, etc.
            $table->string('transaction_id')->nullable();   // ID renvoyé par la plateforme de paiement
            $table->string('status')->default('pending');   // pending, completed, failed
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};