<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'brand_id',
        'category_id',
        'subcategory_id',
        'subsubcategory_id',
        'product_name_en',
        'product_name_vn',
        'product_slug_en',
        'product_slug_vn',
        'product_code',
        'product_quantity',
        'product_tag_en',
        'product_tag_vn',
        'product_size_en',
        'product_size_vn',
        'selling_price',
        'discount_price',
        'short_description_en',
        'short_description_vn',
        'long_description_en',
        'long_description_vn',
        'product_thumbnail',
        'hot_deals',
        'featured',
        'special_offer',
        'special_deal',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }

    public function subsubcategory(){
        return $this->belongsTo(SubSubCategory::class,'subsubcategory_id','id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
}