<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'discount_code_id',
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class)->with('product');
    }

    public function discountCode()
    {
        return $this->belongsTo(DiscountCode::class);
    }
}