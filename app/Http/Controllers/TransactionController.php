<?php

namespace App\Http\Controllers;
use App\HistoryProduct;
use App\Product;
use App\ProductTransaction;
use App\Transaction;
use Cart;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        $id = 1;

        $items = Cart::session($id)->getContent();

        if(Cart::isEmpty()){
            $cart_data = [];
        }
        else{
            foreach($items as $item) {
                $cart[] = [
                    'itemId' => $item->id,
                    'name' => $item->name,
                    'qty' => $item->quantity,
                    'pricesingle' => $item->price,
                    'price' => $item->getPriceSum(),
                    'created_at' => $item->attributes['created_at'],
                ];
            }
            $cart_data = collect($cart)->sortBy('created_at');
        }

        $total = Cart::session($id)->getTotal();

        return view('pos.index',compact('products','cart_data','total'));
    }

    public function addProduct($id) {

        $product = Product::find($id);
        $id1 = 1;
        $cart = Cart::session($id1)->getContent();
        $cek_itemId = $cart->whereIn('id', $id);

        if($cek_itemId->isNotEmpty()){
            if($product->quantity == $cek_itemId[$id]->quantity){
                return redirect()->back()->with('error','jumlah item kurang');
            }else{
                Cart::session($id1)->update($id, array(
                    'quantity' => 1
                ));
            }
        }else{
             Cart::session($id1)->add(array(
            'id' => $id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(
                'created_at' => date('Y-m-d H:i:s')
            )
        ));

        }

        return redirect()->back();

    }

    public function decreasecart($id){
        $product = Product::find($id);
        $id1 =1;

        $cart = Cart::session($id1)->getContent();
        $cek_itemId = $cart->whereIn('id', $id);

        if($cek_itemId[$id]->quantity == 1){
            Cart::session($id1)->remove($id);
        }else{
            Cart::session($id1)->update($id, array(
            'quantity' => array(
                'relative' => true,
                'value' => -1
            )));
        }
        return redirect()->back();

    }

    public function increasecart($id){
        $product = Product::find($id);
        $id1 = 1;

        $cart = Cart::session($id1)->getContent();
        $cek_itemId = $cart->whereIn('id', $id);

        if($product->qty == $cek_itemId[$id]->quantity){
            return redirect()->back()->with('error','jumlah item kurang');
        }else{
            Cart::session($id1)->update($id, array(
            'quantity' => array(
                'relative' => true,
                'value' => 1
            )));

            return redirect()->back();
        }
    }

    public function history(){
        $history = Transaction::orderBy('created_at','desc')->paginate(10);
        return view('pos.history',compact('history'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function removeProductCart($id){
        $id1 =1;
        Cart::session($id1)->remove($id);

        return redirect()->back();
    }

    public function bayar(){
        $id1 = 1;
        $cart_total = Cart::session($id1)->getTotal();
        $all_cart = Cart::session($id1)->getContent();

        $filterCart = $all_cart->map(function($item){
            return [
                'id' => $item->id,
                'quantity' => $item->quantity
            ];
        });


        foreach($filterCart as $cart){
            $product = Product::find($cart['id']);

            if($product->quantity == 0){
                return redirect()->back()->with('errorTransaksi','jumlah pembayaran gak valid');
            }

            HistoryProduct::create([
                'product_id' => $cart['id'],
                'user_id' => $id1,
                'qty' => $product->quantity,
                'qtyChange' => -$cart['quantity'],
                'tipe' => 'decrease from transaction'
            ]);

            $product->decrement('quantity',$cart['quantity']);
        }

        $id = IdGenerator::generate(['table' => 'transaction', 'length' => 10, 'prefix' =>'INV-', 'field' => 'invoices_number']);

        Transaction::create([
            'invoices_number' => $id,
            'user_id' => $id1,
            'pay' => 1000000,
            'total' => $cart_total
        ]);

        foreach($filterCart as $cart){

            ProductTransaction::create([
                'product_id' => $cart['id'],
                'invoices_number' => $id,
                'qty' => $cart['quantity'],
            ]);
        }

        Cart::session($id1)->clear();

        return redirect()->back()->with('success','Transaksi Berhasil dilakukan Tahu Coding | Klik History untuk print');
    }

    public function clear(){
        $id1 = 1;
        \Cart::session($id1)->clear();
        return redirect()->back();
    }
}
