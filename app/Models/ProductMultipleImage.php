<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductMultipleImage extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'product_id',
        'product_image',
        'created_by',
        'updated_by',
    ];
}
