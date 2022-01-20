<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'newId',
        'product_name',
        'description',
        'style',
        'brand',
        'url',
        'product_type',
        'shipping_price',
        'note',
        'admin_id',
        'created_at',
        'updated_at'
    ];

    public function adminId(){
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
