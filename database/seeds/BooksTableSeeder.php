<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Author;

class BooksTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
// 'SELECT id FROM authors ORDER BY RAND() LIMIT 1'

    public function run() {
  
  		$faker = Faker\Factory::create();

        for($i=0; $i<50; $i++) {
       	DB::table('books')->insert([
        	'name' => $faker->jobTitle,
        	'author_id' => DB::table('authors')->inRandomOrder()->first()->id,
        	'category' =>  DB::table('categories')->inRandomOrder()->first()->id
        	]);
    	}
	}

	

	
}
