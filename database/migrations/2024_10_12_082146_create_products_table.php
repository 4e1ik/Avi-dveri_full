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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string ('title', '255')->nullable('false');
            $table->text ('description')->nullable('true');
            $table->float ('price')->nullable('false');
            $table->float ('price_per_set')->nullable('false');
            $table->text ('category')->nullable('true');
            $table->string ('currency','255')->nullable('false')->default('BYN');
            $table->json ('label')->nullable('true');
            $table->boolean ('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
