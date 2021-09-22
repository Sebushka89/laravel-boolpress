<?php

use Illuminate\Database\Seeder;

use App\post;
use App\Category;

use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categoryList = [
            'Cronaca',
            'Sport',
            'Opinione',
            'Turismo',
            'Musica',
            'Cinema'
        ];

        $listOfCategoryID = []; 

        foreach($categoryList as $category) {
            $categoryObject = new Category();
            $categoryObject->name = $category;
            $categoryObject->save();
            $listOfCategoryID[] = $categoryObject->id;
        }

        for ($i = 0; $i < 50; $i++){

            
            $postObject = new post();
            $postObject->data = $faker->dateTime(); 
            $postObject->title = $faker->sentence(5);  
            $postObject->author = $faker->sentence(2); 
            $postObject->cover = $faker->imageUrl(640, 480, 'posts', true);
            $randCategoryKey = array_rand($listOfCategoryID, 1);
            $categoryID = $listOfCategoryID[$randCategoryKey];
            $postObject->category_id = $categoryID;
            $postObject->save();
        }
    }
}
