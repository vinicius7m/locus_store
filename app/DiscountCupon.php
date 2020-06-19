<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountCupon extends Model
{
    protected $fillable = [
        'name',
        'locator',
        'discount',
        'discount_mode',
        'limit',
        'limit_mode',
        'dthr_validade',
        'ativo'
    ];
}
