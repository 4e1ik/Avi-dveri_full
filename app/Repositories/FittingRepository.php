<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Fitting;

class FittingRepository
{
    public function createFitting(
        int     $product_id,
        string  $function,
    )
    {
        return Fitting::create([
            'product_id' => $product_id,
            'function' =>   $function,
        ]);
    }

    public function updateFitting(
        Fitting $fitting,
        int     $product_id,
        string  $function,
    )
    {
        return $fitting->update([
            'product_id' => $product_id,
            'function' =>   $function,
        ]);
    }
}