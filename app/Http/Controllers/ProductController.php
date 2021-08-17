<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Seller;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('pages/home', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ProductType::all();
        return view('pages/products/create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        Validator::make($request->all(),[
//            'name' => 'required',
//            'price' => 'required',
//            'stock' => 'required',
//            'description' => 'required',
//            'type' => 'required'
//        ])->validate();
        $user = auth()->user();
        $seller = $user->seller;
        $file = $request->file('image');
        $hash = str_replace('.' . $file->extension(), '', $file->hashName());
        $path = "$hash.{$file->getClientOriginalExtension()}";
        $file->storeAs("products/",$path);
        $productType = ProductType::where('name',$request->type)->first();
        $product = $seller->products()->create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'seller_id' => $seller->id,
            'product_type_id' => $productType->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => null,
        ]);
        $product->save();
        return back()->with('status', 'Insert Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('pages/products/detail',compact('product'));
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
