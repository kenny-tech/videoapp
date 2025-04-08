<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
        $user = User::first();
        $category = Category::first();

        for ($i = 1; $i <= 5; $i++) {
            Video::create([
                'user_id' => $user->id,
                'category_id' => $category->id,
                'title' => 'Sample Video ' . $i,
                'description' => 'Description for video ' . $i,
                'url' => 'https://example.com/video' . $i . '.mp4'
            ]);
        }
    }
}
