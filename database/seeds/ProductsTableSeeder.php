<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('products')->insert([
        'name' => "Native Chicken", 
        'desc' => "Free-range chickens", 
        'price' => 215, 
        'qty' => 100, 
        'type' => 1, 
        'img'=>'chicken_native.jpg', 
        'created_at'=>'2020-06-29 11:45:26', 
        ]);			

    DB::table('products')->insert([
        'name' => "Broiler Chicken", 
        'desc' => "45 days", 
        'price' => 110, 
        'qty' => 100, 
        'type' => 1, 
        'img'=>'chicken_broiler.jpg', 
        'created_at'=>'2020-06-29 11:45:26', 
        ]);		

    DB::table('products')->insert([
        'name' => "Turkey", 
        'desc' => "Great for roasting.", 
        'price' => 430, 
        'qty' => 100, 
        'type' => 1, 
        'img'=>'turkey.jpg', 
        'created_at'=>'2020-06-29 11:45:26', 
        ]);		

    DB::table('products')->insert([
        'name' => "Duck", 
        'desc' => "Ready to lay eggs", 
        'price' => 80, 
        'qty' => 100, 
        'type' => 1, 
        'img'=>'duck.jpg', 
        'created_at'=>'2020-06-29 11:45:26', 
        ]);		

    DB::table('products')->insert([
        'name' => "Guinea Fowl", 
        'desc' => "Very rich in proein", 
        'price' => 450, 
        'qty' => 100, 
        'type' => 1, 
        'img'=>'guineafowl.jpg', 
        'created_at'=>'2020-06-29 11:45:26', 
        ]);	

    DB::table('products')->insert([
        'name' => "Pig", 
        'desc' => "Nice and plump. Pigles also available", 
        'price' => 120, 
        'qty' => 100, 
        'type' => 1, 
        'img'=>'pig.jpg', 
        'created_at'=>'2020-06-29 11:45:26', 
        ]);		

    DB::table('products')->insert([
        'name' => "Rabbit", 
        'desc' => "Fluffy and adorable rabbits.", 
        'price' => 800, 
        'qty' => 100, 
        'type' => 1, 
        'img'=>'rabbit.jpg', 
        'created_at'=>'2020-06-29 11:45:26', 
        ]);			

    DB::table('products')->insert([
        'name' => "Goat", 
        'desc' => "Very healthy tot eat", 
        'price' => 330, 
        'qty' => 100, 
        'type' => 1, 
        'img'=>'goat.jpg', 
        'created_at'=>'2020-06-29 11:45:26', 
        ]);	

    DB::table('products')->insert([
        'name' => "Tilapia", 
        'desc' => "Fresh tilapia", 
        'price' => 100, 
        'qty' => 100, 
        'type' => 1, 
        'img'=>'tilapia.jpg', 
        'created_at'=>'2020-06-29 11:45:26', 
        ]);	

    DB::table('products')->insert([
        'name' => "Fresh eggs", 
        'desc' => "Freshly-laid eggs", 
        'price' => 220, 
        'qty' => 100, 
        'type' => 1, 
        'img'=>'egg_fresh.jpg', 
        'created_at'=>'2020-06-29 11:45:26', 
        ]);	

    DB::table('products')->insert([
        'name' => "Salted eggs", 
        'desc' => "Organically-salted eggs", 
        'price' => 300, 
        'qty' => 100, 
        'type' => 1, 
        'img'=>'egg_salt.jpg', 
        'created_at'=>'2020-06-29 11:45:26', 
        ]);
    }
}