<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'status',
        'price'
    ];   
    public function product() {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
