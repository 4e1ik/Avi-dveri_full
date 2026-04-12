<?php

namespace App\Repositories;

use App\Models\Manufacturer;
use Illuminate\Support\Facades\DB;

class ManufacturerRepository
{
    public function create(
        string $name,
        string $slug,
        string $type,
        bool $active,
    ): bool
    {
        return DB::transaction(function () use ($name, $slug, $type, $active) {
            Manufacturer::create([
                'name' => $name,
                'slug' => $slug,
                'type' => $type,
                'active' => $active,
            ]);

            return true;
        });
    }

    public function update(
        string $name,
        string $slug,
        string $type,
        bool $active,
        MAnufacturer $manufacturer
    ): bool
    {
        return DB::transaction(function () use ($name, $slug, $type, $active, $manufacturer) {
            $manufacturer->update([
                'name' =>   $name,
                'slug' =>   $slug,
                'type' =>   $type,
                'active' => $active,
            ]);

            return true;
        });
    }

    public function destroy(Manufacturer $manufacturer): bool
    {
        return DB::transaction(function () use ($manufacturer) {
            $manufacturer->delete();
            return true;
        });
    }
}