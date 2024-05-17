<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Area::factory()->count(5)->sequence(
            ['id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'nombre' => 'Desarrollo Sostenible'],
            ['id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'nombre' => 'Desarrollo Humano'],
            ['id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'nombre' => 'Ciencia y Tecnología'],
            ['id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'nombre' => 'Gestión Global y Política'],
            ['id' => '9b902a68-a40b-4c31-9eb8-f2d395fdac61', 'nombre' => 'Innovación en Educación y Humanidades'],
        )
            ->create();
    }
}
