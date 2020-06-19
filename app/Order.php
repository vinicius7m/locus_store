<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id', 
        'status',
    ]; 

    public function order_products() {
        return $this->hasMany('App\OrderProduct')
                ->select(\DB::raw('product_id, sum(discount) as discounts, sum(price) as prices, count(1) as quantity') )
                ->groupBy('product_id')
                ->orderBy('product_id', 'desc'); 
    } 

    public function order_products_itens() {
        return $this->hasMany('App\OrderProduct');
    }

    public static function queryId($where) {
        $order = self::where($where)->first(['id']);
        return !empty($order->id) ? $order->id : null;
    }
}
