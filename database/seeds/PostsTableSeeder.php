<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\Category;
use App\Models\Post;
use App\User;
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
        $categories_id = Category::pluck('id')->toArray();
        $user_ids  = User::pluck('id')->toArray();

        for($i = 0; $i < 50; $i++)
        {
            $newPost = new Post();

            $newPost->title = $faker->sentence(1);
            $newPost->user_id = Arr::random($user_ids);
            $newPost->post_content = $faker->sentence(5);
            $newPost->img_url = $faker->imageUrl(300, 300, $newPost->title, true);
            $newPost->slug = Str::slug($newPost->title, '-');

            $newPost->category_id = Arr::random($categories_id); 


            $newPost->save();
        }
    }
}
