<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Order;
class OrdersController extends Controller
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
        $allOrders = [];
        $ordersCart = Order::all();
        foreach($ordersCart as $orderCart)
        {
            foreach($orderCart->products as $product)
            {
                array_push($allOrders,$product) ;
            }
           
        }
        return $allOrders;

       
      
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function authIndex()
    {
        $products = auth('api')->user()->profile->order->products;
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
       return $request;
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
        $product = Product::findOrFail($id);

        $order = auth('api')->user()->profile->order;
        $order->products()->detach($product);   
    }
    public function confirm(Request $request,$id)
    {
        $confirmedProduct = Product::find($request->model['id']);

        $orderCarts = Order::all();
        foreach($orderCarts as $orderCart)
        {
            foreach($orderCart->products as $product)
            {
                if($product->pivot->order_id == $request->model['pivot']['order_id'])
                {
                    return $orderCart->products()->detach($confirmedProduct);
                }
            }
        }


       


    }

    public function claimAll()
    {
        $order = auth('api')->user()->profile->order;
        $order->products()->detach();
        return $order->products;  
    }
}