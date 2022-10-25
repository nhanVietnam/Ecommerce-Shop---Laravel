<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipDivision extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    protected $table = 'ship_divisions';

    protected $fillable = [
        'division_name',
        'created_at',
    ];
}