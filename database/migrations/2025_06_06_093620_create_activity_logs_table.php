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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('model_type');       // e.g., "Client"
            $table->unsignedBigInteger('model_id'); // e.g., 7
            $table->string('action');           // e.g., "created", "updated", "deleted"
            $table->unsignedBigInteger('user_id'); // who did this
            $table->json('details')->nullable(); // optional extra data
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
