<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'productName',
        'categoryId',
        'productUnitId',
        'productPrice',
        'productDiscount',
        'productShipCharge',
        'productSlug',
        'productImage',
        'productDescription',
        'status',
        'is_featured',
        'is_newArrival',
        'is_offers',
        'is_bestSelling',
        'created_by',
        'updated_by',
    ];


    public function category(){
    	return $this->belongsTo(Category::class,'categoryId','id');
    }
    public function unit(){
    	return $this->belongsTo(ProductUnit::class,'productUnitId','id');
    }
}
