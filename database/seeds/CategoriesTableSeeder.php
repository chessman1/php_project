<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class CategoriesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run() {
  
  		$faker = Faker\Factory::create();;

        for($i=0; $i<50; $i++) {
        
        if($i>10){
            DB::table('categories')->insert([
            'category' => $faker->company,  
            'category_id' => DB::table('categories')->inRandomOrder()->first()->id
            ]);
        }

        else {
            DB::table('categories')->insert([
            'category' => $faker->company
                ]);
            }  
        }
	}
}
