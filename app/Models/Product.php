<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = [
        'product',
    ];
    use HasFactory;
    public function baskets(){
        return $this->hasMany(Basket::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

}
