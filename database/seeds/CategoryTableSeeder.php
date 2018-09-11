<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        //Category::truncate();
		
		$faker = Faker::create();
		// And now, let's create a few cateories in our database:
        for ($i = 0; $i < 10; $i++) {
			//$title = $faker->sentence;
			$title = "Category";
			$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title))); ;
			
            Category::create([
                'title' => $title.$i,
                'slug' => $slug."-".$i,
            ]);
        }
    }
	
	
}
