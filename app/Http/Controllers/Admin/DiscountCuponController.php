<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscountCuponController extends Controller
{
    public function index() {
        $discounts = \App\DiscountCupon::paginate(10);

        return view('admin.discounts.index', compact('discounts'));
    }

    public function create() {
        return view('admin.discounts.create');
    }

    public function discount(Request $request) {
        $data = $request->all();

        \App\DiscountCupon::create($data);

        flash('Desconto criado com sucesso')->success();

        return redirect()->route('admin.discounts.index');
    }

    public function edit($discount) {
        $discount = \App\DiscountCupon::find($discount);

        return view('admin.discounts.edit', compact('discount'));
    }

    public function update(Request $request, $discount) {
        $data = $request->all();

        $discount = \App\DiscountCupon::find($discount);
        $discount->update($data);

        flash('Desconto atualizado com sucesso')->success();

        return redirect()->route('admin.discounts.index');

    }

    public function destroy($discount) {
        $discount = \App\DiscountCupon::find($discount);
        $discount->delete();

        flash('Desconto deletado com sucesso')->success();
        return redirect()->route('admin.discounts.index');

    }
}
