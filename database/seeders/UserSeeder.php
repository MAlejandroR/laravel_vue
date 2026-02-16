<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user =User::factory()->create([
            'name' => 'admin',
            'email' => 'a@a.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole('admin');
        User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('teacher');
        });
        User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('student');
        });
        User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('guest');
        });
    }
}
