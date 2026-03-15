<?php

use App\Models\Product;
use App\Helpers\SlugGenerateHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug', 255)->nullable()->after('id');
        });

        $helper = new SlugGenerateHelper();
        $used = [];

        Product::orderBy('id')->get()->each(function (Product $product) use ($helper, &$used) {
            $base = $helper->slug((string) $product->title);
            if ($base === '') {
                $base = 'product-' . $product->id;
            }
            $slug = $base;
            $n = 2;
            while (isset($used[$slug])) {
                $slug = $base . '-' . $n;
                $n++;
            }
            $used[$slug] = true;
            $product->update(['slug' => $slug]);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->unique('slug');
        });

        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE products MODIFY slug VARCHAR(255) NOT NULL');
        }
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};
