<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Door;

class DoorRepository
{
    public function createDoor(
        int     $product_id,
        ?array   $size,
        ?string  $glass,
        ?string  $type,
        ?string  $function,
        ?string  $material,
        bool     $sound_insulation = true,
        bool     $mirror = false,
    )
    {
        return Door::create([
            'product_id' => $product_id,
            'size' =>       $size,
            'glass' =>      $glass,
            'type' =>       $type,
            'function' =>   $function,
            'material' =>   $material,
            'sound_insulation' => $sound_insulation,
            'mirror' => $mirror,
        ]);
    }

    public function updateDoor(
        Door    $door,
        int     $product_id,
        ?array   $size,
        ?string  $glass,
        ?string  $type,
        ?string  $function,
        ?string  $material,
        bool     $sound_insulation = true,
        bool     $mirror = false,
    )
    {
        return $door->update([
            'product_id' => $product_id,
            'size' =>       $size,
            'glass' =>      $glass,
            'type' =>       $type,
            'function' =>   $function,
            'material' =>   $material,
            'sound_insulation' => $sound_insulation,
            'mirror' => $mirror,
        ]);
    }
}