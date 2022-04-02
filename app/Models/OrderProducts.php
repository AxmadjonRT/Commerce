<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;

    protected $table = "order_products";

    public function orders()
    {
        return $this->belongsTo(Orders::class);
    }

    public function products()
    {
        return $this->belongsTo('App\Models\Products');
    }

}
