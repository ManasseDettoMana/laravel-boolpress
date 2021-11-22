<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;
class CategoriesTableSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryNames = ['HTML', 'CSS', 'JS', 'PHP', 'MySQL', 'Laravel', 'VueJS'];
        
        foreach($categoryNames as $name)
        {
            $category = new Category();
            $category->name = $name;
            $category->slug = Str::slug($category->name, '-');
            $category->save();
        }
    }
}
