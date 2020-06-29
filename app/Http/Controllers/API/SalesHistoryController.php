<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SalesHistory;
use Auth;

class SalesHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SalesHistory::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        foreach($request->all() as $req)
        {
            SalesHistory::create([
                'buyer_id'=>$req['pivot']['buyer_id'],
                'order_id'=>$req['id'],
                'product_id'=>$req['pivot']['product_id'],
                'price'=>$req['pivot']['total_price'],
                'qty'=>$req['pivot']['qty'],
                'phone_number'=>$req['pivot']['phone_number'],
                'shipping_address'=>$req['pivot']['shipping_address']
            ]);

        }

     
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
        //
    }
}