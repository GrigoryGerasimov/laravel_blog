<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Category, Tag, Post, PostTag};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Category::factory(20)->create();
        Tag::factory(30)->create();
        Post::factory(300)->create();
        PostTag::factory(55)->create();
    }
}
