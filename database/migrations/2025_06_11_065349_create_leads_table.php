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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('source')->nullable(); // Instagram, Facebook, etc.
            $table->string('priority')->nullable(); // Low, Medium, High
            $table->string('status')->default('New'); // Proposal Sent, etc.
            $table->text('remarks')->nullable();
            $table->date('follow_up_date')->nullable();
            $table->boolean('is_converted')->default(false);
            $table->timestamp('converted_on')->nullable();
            $table->unsignedBigInteger('assigned_to')->nullable(); // user_id
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
