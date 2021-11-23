<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
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
        for($i = 0; $i < 50; $i++)
        {
            $newPost = new Post();

            $newPost->title = $faker->sentence(1);
            $newPost->author = $faker->name();
            $newPost->post_content = $faker->sentence(5);
            // $newPost->category_id = $faker->numberBetween(1, 6);
            $newPost->img_url = $faker->imageUrl(300, 300, $newPost->title, true);
            $newPost->slug = Str::slug($newPost->title, '-');
            $newPost->save();
        }
    }
}
