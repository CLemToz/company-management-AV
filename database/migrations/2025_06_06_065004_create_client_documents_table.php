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
        Schema::create('client_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->string('file_name');
            $table->string('file_path'); // Storage path (e.g., `uploads/clients/xyz.pdf`)
            $table->foreignId('uploaded_by')->constrained('users');
            $table->foreignId('uploaded_on');
            $table->foreignId('project_id')->nullable()->constrained(); // Optional link to project
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_documents');
    }
};
