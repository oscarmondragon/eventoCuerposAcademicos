<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(1)->create();

        User::factory()->count(1)->sequence(
            ['name' => 'admin', 'email' => 'admin@gmail.com'],
        )
            ->create();
            
            $this->call([
                AreaSeeder::class,
                GrupoSeeder::class,
                SubAreaSeeder::class,
            ]);
    }
}
