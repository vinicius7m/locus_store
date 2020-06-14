<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    
    public function index() {
        $categories = \App\Category::paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function category(Request $request) {
        $data = $request->all();

        Category::create($data);

        flash('Categoria criada com sucesso')->success();

        return redirect()->route('admin.categories.index');
    }

    public function edit($category) {
        $category = \App\Category::find($category);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $category) {
        $data = $request->all();

        $category = \App\Category::find($category);
        $category->update($data);

        flash('Categoria atualizada com sucesso')->success();

        return redirect()->route('admin.categories.index');

    }

    public function destroy($category) {
        $category = \App\Category::find($category);
        $category->delete();

        flash('Loja deletada com sucesso')->success();
        return redirect()->route('admin.categories.index');

    }

}
