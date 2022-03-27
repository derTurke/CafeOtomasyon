<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function table(){
        return $this->belongsTo(Table::class);
    }
    public function address(){
        return $this->belongsTo(Address::class);
    }
}
