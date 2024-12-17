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
            $table->string ('price_per_canvas','255')->nullable('false');
            $table->string ('price_per_set','255')->nullable('false');
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
