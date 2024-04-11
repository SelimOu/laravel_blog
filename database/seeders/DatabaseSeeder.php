<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // user::factory(10)->create();
        
        $this->call([
            PostSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' =>bcrypt('test'),
            'role'=> 'admin',
        ]);

        // post::factory()->create([
        //     'title' => 'test numero 1',
        //     'description' => 'description numero 1',
        //     'content' =>'content numero1',
        //     'image'=> 'imagetest.jpg',
        // ]);

        

    }
}
