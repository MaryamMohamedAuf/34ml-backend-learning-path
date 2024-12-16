<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void{

  User::create([
      'email' => 'manager@gmail.com',
      'password' => bcrypt('34ml'),
      'is_manager' => '1',
      'name' => 'manager',
        ]);
        User::create([
            'email' => 'notManager@gmail.com',
            'password' => bcrypt('34ml'),
            'is_manager' => '0',
            'name' => 'not manager',
        ]);

        $this->call([
        StudentSeeder::class,
        TeacherSeeder::class,
        TagSeeder::class,
        CommentSeeder::class,
    ]);
    }
}
