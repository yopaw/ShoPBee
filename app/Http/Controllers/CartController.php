<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = auth()->user()->carts;
        return view('pages.carts.index', compact('carts'));
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
    public function store(Request $request, Product $product)
    {
        $user = auth()->user();
        $cart = $user->carts->where('seller_id',$product->seller->id)->first();
        if($cart == null){
            Cart::create([
                'seller_id' => $product->seller->id,
                'user_id' => $user->id
            ]);
            $lastCart = Cart::all()->last();
            DB::table('cart_product')->insert([
                'product_id' => $product->id,
                'quantity' => 1,
                'cart_id' => $lastCart->id
            ]);
            return back();
        }
        if($cart->products()->where('product_id',$product->id)->first() == null){
            DB::table('cart_product')->insert([
                'product_id' => $product->id,
                'quantity' => 1,
                'cart_id' => $cart->id
            ]);
            return back();
        }

        DB::table('cart_product')->update([
           'quantity' =>  $cart->products()->where('product_id',$product->id)->first()->pivot->quantity+1
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        $vouchers = $cart->seller->vouchers;
        return view('pages.carts.show', compact('cart', 'vouchers'));
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
    public function destroy(Cart $cart,Product $product)
    {
        DB::table('cart_product')->where([
            ['product_id',$product->id],
            ['cart_id',$cart->id]
        ])->delete();
        if($cart->products->count() == 0){
            $cart->delete();
            return redirect()->route('home');
        }
        return back();
    }
}
