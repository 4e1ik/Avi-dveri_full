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
        if (!Schema::hasColumn('products', 'slug')) {
            Schema::table('products', function (Blueprint $table) {
                $table->string('slug', 255)->nullable()->after('id');
            });
        }

        $helper = new SlugGenerateHelper();
        $used = [];

        foreach (
            Product::query()
                ->whereNotNull('slug')
                ->where('slug', '!=', '')
                ->pluck('slug') as $existing
        ) {
            $used[$existing] = true;
        }

        Product::query()
            ->where(function ($q) {
                $q->whereNull('slug')->orWhere('slug', '');
            })
            ->orderBy('id')
            ->chunkById(100, function ($products) use ($helper, &$used) {
                foreach ($products as $product) {
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
                }
            });

        if (!$this->hasUniqueSlugIndex()) {
            Schema::table('products', function (Blueprint $table) {
                $table->unique('slug');
            });
        }

        if (
            DB::connection()->getDriverName() === 'mysql'
            && $this->slugColumnIsNullable()
            && Product::query()
                ->where(function ($q) {
                    $q->whereNull('slug')->orWhere('slug', '');
                })
                ->doesntExist()
        ) {
            DB::statement('ALTER TABLE products MODIFY slug VARCHAR(255) NOT NULL');
        }
    }

    public function down(): void
    {
        if (!Schema::hasColumn('products', 'slug')) {
            return;
        }

        if ($this->hasUniqueSlugIndex()) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropUnique(['slug']);
            });
        }

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }

    private function hasUniqueSlugIndex(): bool
    {
        if (DB::connection()->getDriverName() !== 'mysql') {
            return false;
        }

        $database = DB::connection()->getDatabaseName();

        return (bool) DB::selectOne(
            'SELECT 1 FROM information_schema.statistics
             WHERE table_schema = ? AND table_name = ? AND column_name = ? AND non_unique = 0
             LIMIT 1',
            [$database, 'products', 'slug']
        );
    }

    private function slugColumnIsNullable(): bool
    {
        if (DB::connection()->getDriverName() !== 'mysql') {
            return false;
        }

        $database = DB::connection()->getDatabaseName();

        $row = DB::selectOne(
            'SELECT IS_NULLABLE FROM information_schema.columns
             WHERE table_schema = ? AND table_name = ? AND column_name = ?',
            [$database, 'products', 'slug']
        );

        return $row && $row->IS_NULLABLE === 'YES';
    }
};
