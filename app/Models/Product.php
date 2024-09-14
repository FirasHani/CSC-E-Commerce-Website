<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'brand_id', 'price', 'image',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}

