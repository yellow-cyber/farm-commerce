<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Intervention\Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return Product::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'qty' => ['required', 'integer'],
            'type' => ['required','integer','min:0','max:1'],
            'desc' => ['required','string'],
            'img' => ['required'],
            //img should be image
        ]);

      
            $name = time().'.' . explode('/', explode(':', substr($request->img, 0, strpos($request->img, ';')))[1])[1];

            \Image::make($request->img)->save(public_path('images/products/').$name);
            $request->merge(['img' => $name]);
            $product = Product::create($request->all());

        
       
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
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'qty' => ['required', 'integer'],
            'type' => ['required','integer','min:0','max:1'],
            'desc' => ['required','string']
        ]); 
        $product = Product::findOrFail($id);
        $currentImg = $product->img;
        if($request->img != $currentImg){
            $name = time().'.' . explode('/', explode(':', substr($request->img, 0, strpos($request->img, ';')))[1])[1];

            \Image::make($request->img)->save(public_path('images/products/').$name);
            $request->merge(['img' => $name]);

            $userImg = public_path('images/products/').$currentImg;
            if(file_exists($userImg)){
                @unlink($userImg);
            }

        }
        return $product->update($request->all());



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
        $product =  Product::findOrFail($id);
        File::delete('images/products/'.$product->img);
        $product->delete();
      
    }
}