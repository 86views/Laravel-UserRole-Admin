<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
        Role::create(['name' => 'student']);
        Role::create(['name' => 'teacher']);
        Role::create(['name' => 'admin']);

        $password = Hash::make('oluleye123');
         
        User::create([
          'name' => 'admin',
          'email' => 'admin@example.com',
          'password' => $password ,
          'role_id' => 3,
        ]);

        User::create([
          'name' => 'teacher',
          'email' => 'teacher@example.com',
          'password' => $password ,
          'role_id' => 2,
        ]);

        User::create([
          'name' => 'student',
          'email' => 'student@example.com',
          'password' => $password ,
          'role_id' => 1,
        ]);
      

        $this->call([TaskSeeder::class]);
    }
}
