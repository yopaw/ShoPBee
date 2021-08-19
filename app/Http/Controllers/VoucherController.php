<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = Voucher::all();
        return view('pages/vouchers/index',compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellers = Seller::all();
        return view('pages/vouchers/create',compact('sellers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
            'stock' => 'required',
            'seller' => 'required',
            'description' => 'required',
            'discount' => 'required',
            'maximum' => 'required',
            'minimum' => 'required'
        ])->validate();

        Voucher::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'description' => $request->description,
            'discount' => $request->discount,
            'maximum_price' => $request->maximum,
            'minimum_price' => $request->minimum
        ]);

        $voucher = Voucher::all()->last();
        foreach ($request->seller as $seller){
            $sellerId = Seller::where('name',$seller)->first()->id;
            DB::table('seller_voucher')->insert([
                'voucher_id' => $voucher->id,
                'seller_id' => $sellerId
            ]);
        }
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
        //
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
