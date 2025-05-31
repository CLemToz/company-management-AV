<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('emp_id')->nullable(); // Internal employee ID
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // Extra Fields
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->text('address')->nullable();

            $table->enum('role', ['admin', 'employee', 'hr', 'project_manager', 'senior_executive'])->default('employee');
            $table->string('department')->nullable();
            $table->string('designation')->nullable();
            $table->string('team')->nullable();
            $table->unsignedBigInteger('manager_id')->nullable();

            $table->date('joining_date')->nullable();
            $table->enum('employment_type', ['full_time', 'intern', 'contract'])->default('full_time');
            $table->enum('status', ['active', 'resigned', 'suspended', 'on_leave'])->default('active');

            $table->string('profile_image')->nullable();
            $table->integer('leave_balance')->nullable()->default(0);
            $table->decimal('salary', 10, 2)->nullable();

            $table->rememberToken();
            $table->timestamps();

            // Foreign key for manager
            $table->foreign('manager_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
