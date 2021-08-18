<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\HeaderTransaction;
use App\Models\Transaction;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        $user = auth()->user();

        if($type == 'buyer') $transactions = Transaction::where('user_id',$user->id)->get();
        else{
            $seller = auth()->user()->seller;
            $transactions = Transaction::where('seller_id',$seller->id)->get();
        }
        return view('pages/transactions/index', compact('transactions','type'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cart $cart)
    {
        $user = auth()->user();
        $totalPrice = $cart->getTotalPrice($cart->id);
        $money = $user->money;
        $discount = 0;
        $voucher = Voucher::where('name',$request->voucher)->first();
        if($voucher->stock <= 0) return abort(403);

        foreach ($cart->products as $product){
            if($product->pivot->quantity > $product->stock) return abort(403);
        }

        if($totalPrice > $voucher->maximum_price){
            $discount = $voucher->maximum_price  * $voucher->discount / 100;
        }
        else $discount = $totalPrice * $voucher->discount / 100;
        if($discount > $voucher->minimum_price){
            $discount = $voucher->minimum_price;
        }
        if($totalPrice - $discount > $money) return abort(403);

        $transaction = $user->transactions()->create([
            'user_id' => $cart->user->id,
            'seller_id' => $cart->seller->id,
            'voucher_id' => $voucher->id,
            'date' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        $transaction->save();

        $lastTransaction = Transaction::all()->last();


        foreach ($cart->products as $product){
            DB::table('product_transaction')->insert([
                'product_id' => $product->id,
                'transaction_id' => $lastTransaction->id,
                'quantity' => $product->pivot->quantity
            ]);

            $product->update([
               'stock' => $product->stock - $product->pivot->quantity
            ]);

            $product->save();
            DB::table('cart_product')->where([
                ['product_id',$product->id],
                ['cart_id',$cart->id]
            ])->delete();
        }

        $user->update([
            'money' => $money - ($totalPrice - $discount)
        ]);

        $user->save();
        $cart->delete();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
