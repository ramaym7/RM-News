<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Category::create([
            'title' => 'Olahraga'
        ]);
        Category::create([
            'title' => 'Kabar Daerah'
        ]);
        Category::create([
            'title' => 'Entertaint'
        ]);
        Category::create([
            'title' => 'Otomotif'
        ]);

        Post::factory(10)->create();
        Tag::factory(10)->create();
    }
}
