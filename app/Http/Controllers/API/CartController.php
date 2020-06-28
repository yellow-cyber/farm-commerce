<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Auth;
class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return auth('api')->user()->profile->cart->products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
       $cart = auth('api')->user()->profile->cart;
       $product = Product::findOrFail($id);
       $cart->products()->toggle($product);
       return $cart->products;

    }
    /**
     * Checkouts resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(){
        $cart = auth('api')->user()->profile->cart;
        $cart->products()->detach();
        return $cart;
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