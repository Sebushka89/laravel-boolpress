<?php

use Illuminate\Database\Seeder;

use App\post;

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
        for ($i = 0; $i < 50; $i++){

            $postObject = new post();
            $postObject->data = $faker->dateTime(); 
            $postObject->title = $faker->sentence(5);  
            $postObject->author = $faker->sentence(2); 
            $postObject->cover = $faker->imageUrl(640, 480, 'posts', true);
            $postObject->save();
        }
    }
}
