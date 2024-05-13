<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CuerpoAcademico;
use App\Models\LineaCatalogo;
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
            ['name' => 'Oscar Mondragón Alcántara', 'email' => 'oscarmondragon100@gmail.com'],
        )
            ->create();

        $this->call([
            AreaSeeder::class,
            GrupoSeeder::class,
            SubAreaSeeder::class,
            TipoLiderSeeder::class,
            PaisCatalogoSeeder::class,
            EspacioAcademicoSeeder::class,
            CuerpoAcademicoSeeder::class,
            LineaCatalogoSeeder::class
        ]);
    }
}
