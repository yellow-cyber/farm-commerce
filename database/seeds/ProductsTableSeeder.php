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

      //ANNOUNCEMENT
      //LIVESTOCK = 1
      //AGRIFARM = 0
       
        /** Note Continue didi ha ubos, same la na ada ha igbaw*/
	 DB::table('products')->insert([
				'name' => "Rice", 
				'desc' => "Premium, low-cost rice milled with peak efficiency to ensure quality and freshness. Sold per sack.", 
				'price' => 2000, 
				'qty' => 100, 
				'type' => 0, 
				'img'=>'rice.jpg', 
				'created_at'=>'2020-06-29 11:45:26', 
        ]);			
         DB::table('products')->insert([
              'name' => "Marcotted Calamansi", 
              'desc' => "Fresh and flavorful calamansi grown through air-layering and sold by the bunch.",
              'price' => 70, 
              'qty' => 100, 
              'type' => 0, 
              'img'=>'calamansi.jpg', 
              'created_at'=>'2020-06-29 11:45:26', 
        ]);			
         DB::table('products')->insert([
              'name' => "Marcotted Jackfruit", 
              'desc' => "Large, moderately ripened jackfruit with a mildly sweet taste and balanced aroma.", 
              'price' => 70, 
              'qty' => 100, 
              'type' => 0, 
              'img'=>'jackfruit.jpg', 
              'created_at'=>'2020-06-29 11:45:26', 
        ]);
         DB::table('products')->insert([
                  'name' => "Madre de Agua", 
                  'desc' => "Carefully-grown Tricanthera with a variety of medical and agricultural uses. Sold by bundle.", 
                  'price' => 60, 
                  'qty' => 100, 
                  'type' => 0, 
                  'img'=>'madredeagua.jpg', 
                  'created_at'=>'2020-06-29 11:45:26', 
        ]);		
         DB::table('products')->insert([
                  'name' => "Bonsai Plants", 
                  'desc' => "Beautiful, small-scale plants that closely mimic full-sized trees. Comes in a variety of aesthetic forms.", 
                  'price' => 1500, 
                  'qty' => 100, 
                  'type' => 0, 
                  'img'=>'bonsai.jpg', 
                  'created_at'=>'2020-06-29 11:45:26', 
        ]);		
         DB::table('products')->insert([
                  'name' => "Orchids", 
                  'desc' => "Large, aromatic flowers that come in a large assortment of vibrant colorations and sold in equally large boquets.", 
                  'price' => 500, 
                  'qty' => 100, 
                  'type' => 0, 
                  'img'=>'orchids.jpg', 
                  'created_at'=>'2020-06-29 11:45:26', 
        ]);
        DB::table('products')->insert([
                  'name' => "Spring Onions", 
                  'desc' => "Fresh spring onions that are perfect whether eaten raw, cooked or as spices.", 
                  'price' => 90, 
                  'qty' => 100, 
                  'type' => 0, 
                  'img'=>'springonion.jpg', 
                  'created_at'=>'2020-06-29 11:45:26', 
        ]);
         DB::table('products')->insert([
                  'name' => "Avocado", 
                  'desc' => "Ripe, delicious avocados that have a vast array of uses from salads to smoothies.", 
                  'price' => 80, 
                  'qty' => 100, 
                  'type' => 0, 
                  'img'=>'avocado.jpg', 
                  'created_at'=>'2020-06-29 11:45:26', 
        ]);		
         DB::table('products')->insert([
                  'name' => "Organic Fertilizer", 
                  'desc' => "Hiqh-quality fertilizer, specially-mixed to ensure rapid soil enrichment and sustainability. Sold per sack.", 
                  'price' => 600, 
                  'qty' => 100, 
                  'type' => 0, 
                  'img'=>'fertilizer.jpg', 
                  'created_at'=>'2020-06-29 11:45:26', 
        ]);		
         DB::table('products')->insert([
                  'name' => "Chicken Feed", 
                  'desc' => "Nutrient-rich chicken feed made from grains, soybeans and adequate mineral suppliments.", 
                  'price' => 1500, 
                  'qty' => 100, 
                  'type' => 0, 
                  'img'=>'chickenfeed.jpg', 
                  'created_at'=>'2020-06-29 11:45:26', 
        ]);		
         DB::table('products')->insert([
                  'name' => "Pig Feed", 
                  'desc' => "Quality, high-energy and protein-rich pig feed made from rice bran and distillers' grains.", 
                  'price' => 99.79, 
                  'qty' => 100, 
                  'type' => 0,
                  'img'=>'pigfeed.jpg', 
                  'created_at'=>'2020-06-29 11:45:26', 
        ]);
    }
}