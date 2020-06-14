<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Product::class, 40)->create()->each(function($product) {
            $product->categories()->save(factory(\App\Category::class)->make());
        });
    }
}
