<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number')->unique();
            $table->integer('floor');
            $table->decimal('price', 10, 2);

            $table->decimal('width', 5, 2)->nullable();
            $table->decimal('length', 5, 2)->nullable();
            $table->decimal('size', 6, 2)->nullable();

            $table->enum('status', [
                'available',
                'occupied',
                'maintenance'
            ])->default('available');

            $table->text('images')->nullable();
            $table->text('description')->nullable();
            $table->json('accessories')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
