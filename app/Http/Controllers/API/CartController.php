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

        $cart = auth('api')->user()->profile->cart;
        $products = $cart->products;
    
        foreach($products as $product){
            $cart->products()->updateExistingPivot($product->id,['total_price'=>$product->price]);
        }
        return $products;

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
    

    }
    /**
     * Checkouts resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {   
        $request->validate([
            'models'=>'required',
            'address'=>'required|string',
            'phone'=>'required|numeric'
        ]);

        $address = $request->address;
        $phone = $request->phone;
       
        $cart = auth('api')->user()->profile->cart;
        $order = auth('api')->user()->profile->order;
        
        foreach($request->models as $model){
            $product = Product::find($model['id']);
            $exists = $order->products->contains($product->id);
            
            $existingProduct =  $order->products->find($product->id);
            $totalPrice = $model['pivot']['total_price'];
            $qty = $model['pivot']['qty'];
            if($exists)
            {
                $existingProduct = $order->products->find($product->id);
                $totalPrice += $existingProduct->pivot->total_price;
                $qty += $existingProduct->pivot->qty;
                $order->products()->detach([$product->id]);
            }
            $order->products()->attach($product->id,
            [
                    'qty'=>  $qty,
                    'total_price'=> $totalPrice,
                    'phone_number'=>$phone,
                    'shipping_address'=>$address
            ]);
        }
        $cart->products()->detach();
        return $order->products;
    
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