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
        Schema::create('meta_template_products', function (Blueprint $table) {
            $table->id();
            $table->string('productType')->nullable(false);
            $table->string('type')->nullable();
            $table->string('function')->nullable();
            $table->string('material')->nullable();
            $table->string('titleTemplate')->nullable(false);
            $table->string('descriptionTemplate')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta_template_products');
    }
};
