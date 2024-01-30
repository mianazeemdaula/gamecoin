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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('seller_id')->constrained('users');
            $table->foreignId('game_package_id')->constrained('game_packages');
            $table->dateTime('end_time');
            $table->unsignedBigInteger('quantity');
            $table->float('price', 8, 2);
            $table->dateTime('seller_confirmed_at')->nullable();
            $table->dateTime('buyer_confirmed_at')->nullable();
            $table->string('status',15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
