<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->category = "Social Media";
        $category->save();
        $category = new Category();
        $category->category = "Community";
        $category->save();
        $category = new Category();
        $category->category = "Creative Process";
        $category->save();
        $category = new Category();
        $category->category = "Blogging";
        $category->save();
    }
}
