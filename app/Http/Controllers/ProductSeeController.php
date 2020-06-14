<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductSeeController extends Controller
{
    public function indexWelcome() {
        $sql = 'select * from products limit 4';
        $products = \DB::select($sql);

        $sqls = 'select * from products order by id desc limit 1';
        $productsone = \DB::select($sqls);

        return view('welcome', compact('products','productsone'));

    }

    public function index() {
        $categories = \App\Category::all(['id', 'name']);
        $products = \App\Product::paginate('9');

        return view('products', compact('products','categories'));
    }
    public function view($product) {
        // $product = new \App\Product();
        $product = \App\Product::find($product);

        return view('view-product', compact('product'));
    }
}
