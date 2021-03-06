<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('token', 64)->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('source')->nullable();
            $table->string('ip', 300)->nullable();
            $table->string('agent')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();

            $table->primary('token');
        });

        Schema::create('attempts', function (Blueprint $table) {
            $table->string('token', 64)->unique();
            $table->json('action')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('ip', 300)->nullable();
            $table->string('agent')->nullable();
            $table->timestamps();

            $table->primary('token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('attempts');
    }
};
