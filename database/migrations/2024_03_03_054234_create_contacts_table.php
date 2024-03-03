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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['company', 'individual']);
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->longText('summary')->nullable();
            $table->text('about')->nullable();
            $table->json('data')->nullable();
            $table->boolean('status')->default(false);
            $table->foreignId('team_id')->references('id')->on('teams')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
