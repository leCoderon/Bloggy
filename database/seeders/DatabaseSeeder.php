<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        $this->call([
            UserSeeder::class,
            ArticleSeeder::class,
            CommentSeeder::class,
            CommentReplySeeder::class,

        ]);
    }
}
