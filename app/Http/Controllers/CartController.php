<?php

namespace App\Http\Controllers;

use App\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $orders = \App\Order::where([
            'status' => 'RE',
            'user_id' => Auth::id()
        ])->get();

        return view('cart', compact('orders'));
    }   

    public function add() {
        $this->middleware('VerificationCsrfToken');

        $req = Request();
        $idproduct = $req->input('id');

        $product = \App\Product::find($idproduct);
        
        if( empty($product->id) ) {
            $req->session()->flash('fail-message', 'Produto não encontrado em nossa loja!');
            return redirect()->route('cart.index');
        }

        $iduser = Auth::id();

        $idorder = \App\Order::queryId(['user_id' => $iduser,'status' => 'RE']);
        
        if( empty($idorder) ) {
            $neworder = \App\Order::create(['user_id' => $iduser, 'status' => 'RE']);
            $idorder = $neworder->id;
        }

        \App\OrderProduct::create([
            'order_id' => $idorder,
            'product_id' => $idproduct,
            'price' => $product->price,
            'status' => 'RE'
        ]);

        $req->session()->flash('success-message', 'Produto adicionado ao carrinho com sucesso!');

        return redirect()->route('cart.index');

    }

    public function delete() {
        
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idorder = $req->input('order_id');
        $idproduct = $req->input('product_id');
        $remove_item = (boolean)$req->input('item');
        $iduser = Auth::id();

        $idorder = \App\Order::queryId([
            'id' => $idorder,
            'user_id' => $iduser,
            'status' => 'RE'
        ]);
        
        if( empty($idorder) ) {
            $req->session()->flash('fail-message', 'Pedido não encontrado!');
            return redirect()->route('cart.index');
        }

        $where_product = [
            'order_id' => $idorder,
            'product_id' => $idproduct
        ];

        $product = \App\OrderProduct::where($where_product)->orderBy('id', 'desc')->first();

        if( empty($product->id) ) {
            $req->session()->flash('fail-message', 'Produto não encontrado no carrinho!');
            return redirect()->route('cart.index');
        }

        if( $remove_item ) {
            $where_product['id'] = $product->id;
        }

        \App\OrderProduct::where($where_product)->delete();

        $check_order = \App\OrderProduct::where([
            'order_id' => $product->order_id
        ])->exists();

        if( !$check_order ) {
            \App\Order::where([
                'id' => $product->order_id
            ])->delete();
        }

        $req->session()->flash('success-message', 'Produto removido do carrinho com sucesso');

        return redirect()->route('cart.index');
    }

    public function finish() {
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idorder = $req->input('order_id');
        $iduser = Auth::id();

        $check_order = \App\Order::where([
            'id' => $idorder,
            'user_id' => $iduser,
            'status' => 'RE'
        ])->exists(0);

        if( !$check_order ) {
            $req->session()->flash('fail-message', 'Pedido não encontrado');    
            return redirect()->route('cart.index');
        }

        $check_products = \App\OrderProduct::where([
            'order_id' =>$idorder,
        ])->exists();

        if( !$check_products ) {
            $req->session()->flash('fail-message', 'Produtos do pedido não encontrado');    
            return redirect()->route('cart.index');
        }

        \App\OrderProduct::where([
            'order_id' => $idorder
            ])->update([
            'status' => 'PA'
        ]);

        \App\Order::where([
            'id' => $idorder
        ])->update([
            'status' => 'PA'
        ]);

        $req->session()->flash('success-message', 'Compra concluída com sucesso!');

        return redirect()->route('cart.shop');

    }

    public function shop() {

        $shops = \App\Order::where([
            'status' => 'PA',
            'user_id' => Auth::id()
        ])->orderBy('created_at', 'desc')->get();

        $cancels = \App\Order::where([
            'status' => 'CA',
            'user_id' => Auth::id()
        ])->orderBy('updated_at', 'desc')->get();

        return view('historic', compact('shops', 'cancels'));

    }

    public function cancel() {
        
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idorder = $req->input('order_id');
        $idsorder_prod = $req->input('id');
        $iduser = Auth::id();

        if( empty($idsorder_prod) ) {
            $req->session()->flash('fail-message', 'Nenhum item selecionado para cancelamento');

            return redirect()->route('cart.shop');
        }

        $check_order = \App\Order::where([
            'id' => $idorder,
            'user_id' => $iduser,
            'status' => 'PA'
        ])->exists();

        if( !$check_order ) {
            $req->session()->flash('fail-message', 'Pedido não encontrado para cancelamento');
            return redirect()->route('cart.shop');
        }

        $check_products = \App\OrderProduct::where([
            'order_id' => $idorder,
            'status' => 'PA'
        ])->whereIn('id', [$idsorder_prod])->exists();
        
        if( !$check_products ) {
            $req->session()->flash('fail-message', 'Produtos do pedido não encontrados!');
            return redirect()->route('cart.shop');
        }

        \App\OrderProduct::where([
            'order_id' => $idorder,
            'status' => 'PA'
        ])->whereIn('id', [$idsorder_prod])->update([
            'status' => 'CA'
        ]);

        $check_order_cancel = \App\OrderProduct::where([
            'order_id' => $idorder,
            'status' => 'PA'
        ])->exists();  

        if(!$check_order_cancel) {
            \App\Order::where([
                'id' => $idorder
            ])->update([
                'status' => 'CA'
            ]);

            $req->session()->flash('success-message', 'Compra cancelada com sucesso!');

        } else {
            $req->session()->flash('success-message', 'Item(ns) da compra cancelado(s) com sucesso!');
        }

        return redirect()->route('cart.shop');

    }

    public function discount() {
        $this->middleware('VerifyToken');

        $req = Request();
        
        $idorder = $req->input('order_id');
        $cupon = $req->input('cupon');
        $iduser = Auth::id();
        
        if( empty($cupon) ) {
            $req->session()->flash('fail-message', 'Cupom inválido');
            return redirect()->route('cart.index');
        } 

        $cupon = \App\DiscountCupon::where([
            'locator' => $cupon,
            'ativo' => 'S'
        ])->where('dthr_validade', '>', date('Y-m-d H:i:s'))->first();

        if( empty($cupon->id) ) {
            $req->session()->flash('fail-message', 'Cupom de desconto inválido');
            return redirect()->route('cart.index');
        }

        $check_order = \App\Order::where([
            'id' => $idorder,
            'user_id' => $iduser,
            'status' => 'RE'     
        ]);

        if( !$check_order ) {
            $req->session()->flash('fail-message', 'Pedido não encontrado para validação');
            return redirect()->route('cart.index');
        }

        $order_products = \App\OrderProduct::where([
            'order_id' => $idorder,
            'status' => 'RE'
        ])->get();

        if( empty($order_products) ) {
            $req->session()->flash('fail-message', 'Produtos do pedido não encontrados!');
            return redirect()->route('cart.index');
        }

        $apply_discount = false;

        foreach($order_products as $order_product) {

            switch($cupon->discount_mode) {
                case 'perc':
                    $value_discount = ( $order_product->price * $cupon->discount) / 100;
                    break;
                default:
                    $value_discount = $cupon->discount;
                    break;
     
            }

            $value_discount = ( $value_discount > $order_product->price ) ? 
            $order_product->price : number_format($value_discount, 2);
            
            switch($cupon->limit_mode) {
                case 'quantity':
                    $quantity_order = \App\OrderProduct::whereIn('status', ['PA','RE'])->where([
                        'discount_cupon_id' => $cupon->id
                    ])->count();

                    if( $quantity_order >= $cupon->limit ) {
                        continue 2;
                    }

                    break;
                
                default:
                    $value_ckc_discount = \App\OrderProduct::whereIn('status', ['PA','RE'])->where([
                        'discount_cupon_id' => $cupon->id
                    ])->sum('discount');

                    if( ($value_ckc_discount + $value_discount) > $cupon->limit ) {
                        continue 2;
                    }
                    break;
            }

            $order_product->discount_cupon_id = $cupon->id;
            $order_product->discount = $value_discount;
            $order_product->update();

            $apply_discount = true;

        }

        if( $apply_discount ) {
            $req->session()->flash('success-message', 'Cupom aplicado com sucesso');
        } else {
            $req->session()->flash('fail-message', 'Cupom esgotado!');
        }

        return redirect()->route('cart.index');

    }

}
