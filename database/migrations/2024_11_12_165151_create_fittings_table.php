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
        Schema::create('fittings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger ('product_id')->nullable('true');
            $table->foreign ('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->string ('function','255')->nullable('false');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fittings');
    }
};
