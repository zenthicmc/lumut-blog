<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Account::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'name' => 'Administrator',
            'role' => 'admin',
        ]);

        Account::create([
            'username' => 'author',
            'password' => bcrypt('author'),
            'name' => 'Author',
            'role' => 'author',
        ]);

        Post::create([
            'title' => 'Post Pertama',
            'content' => 'Ini adalah post pertama',
            'date' => now(),
            'username' => 'author',
        ]);

        Post::create([
            'title' => 'Post Kedua',
            'content' => 'Ini adalah post kedua',
            'date' => now(),
            'username' => 'author',
        ]);

        Post::create([
            'title' => 'Post Ketiga',
            'content' => 'Ini adalah post ketiga',
            'date' => now(),
            'username' => 'author',
        ]);
    }
}
