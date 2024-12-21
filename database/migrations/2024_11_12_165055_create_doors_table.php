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
        Schema::create('doors', function (Blueprint $table) {
            $table->id();
            $table->string ('title', '255')->nullable('false');
            $table->text ('description')->nullable('true');
            $table->float ('price_per_canvas')->nullable('false');
            $table->float ('price_per_set')->nullable('false');
            $table->string ('currency','255')->nullable('false')->default('BYN');
            $table->json ('size')->nullable('false  ');
            $table->string ('glass','255')->nullable('true');
            $table->string ('type','255')->nullable('false');
            $table->string ('function', '255')->nullable('false');
            $table->string ('material', '255')->nullable('false');
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
        Schema::dropIfExists('doors');
    }
};
