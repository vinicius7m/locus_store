<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'name','surname','card',
        'card', 'cpf', 'cod',
        'address', 'state', 'city',
        'cep'
    ];
}
