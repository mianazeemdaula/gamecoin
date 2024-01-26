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
        Schema::create('game_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_asset_id')->constrained('game_assets');
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->string("image")->nullable();
            $table->unsignedBigInteger('qty');
            $table->float('price', 8, 2);
            $table->float('offer_price', 8, 2);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_packages');
    }
};
