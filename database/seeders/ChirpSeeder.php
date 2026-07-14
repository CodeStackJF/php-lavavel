<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class ChirpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::count() < 3 ? [
            User::create([
                'name' => 'Alice',
                'email' => 'alice@gmail.com',
                'password' => bcrypt('password')
            ]),
            User::create([
                'name' => 'Jhon',
                'email' => 'jhon@gmail.com',
                'password' => bcrypt('password'),
            ]),
            User::create([
                'name' => 'Priscila',
                'email' => 'priscila@gmail.com',
                'password' => bcrypt('password'),
            ])
        ] : User::take(3)->get();

        $chirps = [ 'stablished fact that a reader will',
                    'ook like readable Engl',
                    'edefined chunks ',
                    ' from sections 1.10.32 and 1.10.33 o',
        ];

        foreach($chirps as $message)
        {
            $users->random()->chirps()->create([
                'message' => $message,
                'created_at' => now()->subMinutes(rand(5,1440))
            ]);
        }
    }
}
