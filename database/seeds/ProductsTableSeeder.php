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
            'name' => "Native chicken", //iya name
            'desc' => "Nice chicken", //iya description
            'price' => 99.79, // it iya price
            'qty' => 100, // kun pira tat stock
            'type' => 0, //0 for livestock , 1 for agri-farm
            'img'=>'1.jpeg', //ig sunod sunod la, 1,2,3,4,5 sugad
            'created_at'=>'2020-06-29 11:45:26', // Date la ini
        ]);
        DB::table('products')->insert([
            'name' => "Malunggay", 
            'desc' => "Nice malunggay", 
            'price' => 99.79, 
            'qty' => 100, 
            'type' => 1, 
            'img'=>'2.jpeg', 
            'created_at'=>'2020-06-29 11:45:26', 
        ]);
       
    }
}