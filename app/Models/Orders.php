<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = "orders";

    public function orderProducts()
    {
        return $this->hasMany(OrderProducts::class);
    }

    public function clients()
    {
        return $this->belongsTo(Clients::class);
    }

    

}
