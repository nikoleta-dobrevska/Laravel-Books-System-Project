<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     @return void
     */
    public function run()
    {
        User::create([
                'name'=>'AdminExample',
                'email'=>'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'is_admin' => true
        ]);

        User::create([
            'name'=>'UserExample',
            'email'=>'user@gmail.com',
            'email_verified_at' => now(),
            'password' => 'password2',
            'remember_token' => Str::random(10),
            'is_admin' => false
        ]);

    }
}
