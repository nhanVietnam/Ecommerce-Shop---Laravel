<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImg extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'product_id',
        'photo_name',
    ];

    public function product(){
        return $this->belongTo(Product::class,'product_id','id');
    }
}