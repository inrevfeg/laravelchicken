<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'categoryName',
        'categorySlug',
        'categoryImage',
        'categoryDescription',
        'created_by',
        'updated_by',
    ];
}