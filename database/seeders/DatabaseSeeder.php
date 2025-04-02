<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Ardian Ilyas',
            'email' => 'ardian@ticket.com',
            'password' => bcrypt('developer')
        ]);

        Category::create([
            'name' => 'Bug Report',
            'description' => 'Report a bug in the application'
        ]);
        
        Category::create([
            'name' => 'Technical Issues',
            'description' => 'Report technical issues with the application'
        ]);

        Category::create([
            'name' => 'Feature Requests',
            'description' => 'Request new features for the application'
        ]);

        $user->tickets()->saveMany(Ticket::factory(20)->create());
    }
}
