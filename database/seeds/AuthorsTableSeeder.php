<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class AuthorsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run() {
  
  		$faker = Faker\Factory::create();

        for($i=0; $i<50; $i++) {
       	DB::table('authors')->insert([
        		'author' => $faker->name
        ]);
    }
	}
}
