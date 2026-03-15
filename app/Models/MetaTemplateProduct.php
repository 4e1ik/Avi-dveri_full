<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaTemplateProduct extends Model
{
    protected $table = 'meta_template_products';

    protected $fillable = [
        'productType',
        'type',
        'function',
        'material',
        'titleTemplate',
        'descriptionTemplate',
    ];
}
