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
        return view('pages/products/create');
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
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required'
        ])->validate();

        $user = auth()->user();
        $seller = $user->seller;

        $product = $seller->products()->create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'seller_id' => $seller->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => null,
        ]);

        if($file = $request->file('image')){
            $hash = str_replace('.' . $file->extension(), '', $file->hashName());
            $path = "$hash.{$file->getClientOriginalExtension()}";
            $file->storeAs("products/",$path);
            $product->image = $path;
            $product->save();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('pages/products/show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
       Validator::make($request->all(),[
           'name' => 'required',
           'price' => 'required',
           'stock' => 'required',
           'description' => 'required',
           'image' => 'required'
       ])->validate();

        $user = auth()->user();
        $seller = $user->seller;

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'seller_id' => $seller->id,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        if($file = $request->file('image')){
            $hash = str_replace('.' . $file->extension(), '', $file->hashName());
            $path = "$hash.{$file->getClientOriginalExtension()}";
            $file->storeAs("products/",$path);
            $product->image = $path;
            $product->save();
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }

    public function manage(){
        $seller = auth()->user()->seller;
        $products = Product::where('seller_id',$seller->id)->get();
        return view('pages.products.manage', compact('products'));
    }

    public function view(){
        $seller = auth()->user()->seller;
        $products = Product::where('seller_id', $seller->id)->get();
        return view('pages.products.index', compact('products'));
    }
}
