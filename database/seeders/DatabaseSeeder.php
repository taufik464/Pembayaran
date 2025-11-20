<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use App\Models\Information;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            // use `username` (database column). The User model maps `name` to `username` for
            // backward compatibility so other code can still use `name` if needed.
            'username' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            CategorySeeder::class,
        ]);

        $this->call([
 Information::factory()->count(5)->inactive()->create(),
        ]);
        
    }
}
