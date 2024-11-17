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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger ('door_id')->nullable('true');
            $table->foreign ('door_id')->references('id')->on('doors')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger ('fitting_id')->nullable('true');
            $table->foreign ('fitting_id')->references('id')->on('fittings')->onDelete('cascade')->onUpdate('cascade');
            $table->string ('image', 255)->nullable('true');
            $table->text ('door_color')->nullable('true');
            $table->text ('description_image')->nullable('true');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
