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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("slug")->unique();
            $table->text('description');
            $table->string("image")->nullable();
            $table->string("thumbnail")->nullable();
            $table->string("web_url")->nullable();
            $table->string("android_url")->nullable();
            $table->string("ios_url")->nullable();
            $table->boolean("is_active")->default(true);
            $table->unsignedInteger("trade_time")->default(15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
