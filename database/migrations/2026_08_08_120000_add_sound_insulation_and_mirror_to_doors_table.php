<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('doors', function (Blueprint $table) {
            $table->boolean('sound_insulation')->default(true)->after('material');
            $table->boolean('mirror')->default(false)->after('sound_insulation');
        });
    }

    public function down(): void
    {
        Schema::table('doors', function (Blueprint $table) {
            $table->dropColumn(['sound_insulation', 'mirror']);
        });
    }
};
