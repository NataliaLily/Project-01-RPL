<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create(
            [
                'post_title' => 'Natalia Evelin Susanto',
                'post_content' => 'Selamat mengerjakan',
                'post_image' => 'post.jpg',
                'category_id' => '1'
            ]);

        Post::create(
            [
                'post_title' => 'Hari Senin',
                'post_content' => 'lorem ipsum',
                'post_image' => 'post.png',
                'category_id' => '2'
            ]);
    }
}
