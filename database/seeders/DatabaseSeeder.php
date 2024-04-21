<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Categorie;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        user::factory(3)->create();
        // Post::factory(10)->create();
        // Categorie::factory(3)->create();

        // $this->call([
        //     PostSeeder::class,
        // ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' =>bcrypt('test'),
            'role'=> 'admin',
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' =>bcrypt('test'),
            'role'=> 'client',
        ]);

        // post::factory()->create([
        //     'title' => 'test numero 1',
        //     'description' => 'description numero 1',
        //     'content' =>'content numero1',
        //     'image'=> 'imagetest.jpg',
        // ]);

        $categorie =Categorie::factory(5)->create();

        Post::factory(20)->create()->each(function ($posts) use ($categorie) {
            $caterand = $categorie->random();
            $posts->categories()->attach($caterand);
        });

      

}
}