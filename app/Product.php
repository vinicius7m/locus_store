<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = ['name','image',
    'brand', 'description','price','quantity',
    'slug'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
