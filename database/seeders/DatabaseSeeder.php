<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'nestlyhouses@gmail.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('changeme123'),
            ]
        );

        $this->call(ProductSeeder::class);
    }
}
