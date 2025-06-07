<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // database/migrations/YYYY_MM_DD_create_clients_table.php
        Schema::create('clients', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('website')->nullable();
            $table->string('industry')->nullable();
            $table->json('tags')->nullable(); // Store tags as JSON (e.g., ["VIP", "Late Payer"])
            $table->text('address')->nullable();
            $table->text('remarks')->nullable();
            $table->foreignId('created_by')->constrained('users'); // Admin/employee who created
            $table->softDeletes(); // Enable soft deletes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
