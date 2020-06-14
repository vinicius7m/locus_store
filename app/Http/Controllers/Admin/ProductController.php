<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = \App\Product::paginate(10);

        return view('admin.products.index', compact('products'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::all(['id', 'name']);

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function product(Request $request)
    {
       
        if($request->file('image')->isValid()) {
            
            $data = $request->all();

            $data['image'] = $request->slug.'.'.$request->image->extension();
            $request->file('image')->storeAs('public/products', $data['image']);
           
            

            $category = \App\Category::find($data['category']);
            
            $product = $category->products()->create($data);

            flash('Produto criado com sucesso!')->success();
            return redirect()->route('admin.products.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $product = \App\Product::find($product);

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {
        $data = $request->all();

        $product = \App\Product::find($product);
        $product->update($data);

        flash('Produto atualizado com sucesso')->success();
        return redirect()->route('admin.products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product = \App\Product::find($product);
        $product->delete();

        flash('Produto deletado')->success();
        return redirect()->route('admin.products.index');
    }
}
