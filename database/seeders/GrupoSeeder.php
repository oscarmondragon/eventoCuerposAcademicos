<?php

namespace Database\Seeders;

use App\Models\Grupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grupo::factory()->count(24)->sequence(

            ['id' => '9b903144-8fb2-4480-938b-1083d48ffaa2', 'nombre' => 'Erradicación de la Pobreza'],
            ['id' => '9b903144-ac97-45b1-9054-30579e08c925', 'nombre' => 'Seguridad Alimentaria'],
            ['id' => '9b903144-b10d-4d83-ae84-9dc36967530c', 'nombre' => 'Gestión Ambiental'],
            ['id' => '9b903144-b669-4e6c-8535-f9416bd4aae7', 'nombre' => 'Desarrollo Urbano Sostenible'],
            ['id' => '9b903144-bb30-4176-836c-21ca2ac27f5b', 'nombre' => 'Acción por el Clima'],
            ['id' => '9b903144-c0d1-4c0f-ab8c-2b4b9885fe54', 'nombre' => 'Salud y Bienestar'],
            ['id' => '9b903144-c547-4b16-acbb-02417c6f4bf4', 'nombre' => 'Educación de Calidad'],
            ['id' => '9b903144-ca76-4ec3-987e-c3d97503b5f7', 'nombre' => 'Igualdad de Género'],
            ['id' => '9b903144-cf50-49f1-8fea-ab3f35e77d9b', 'nombre' => 'Desarrollo Personal y Comunitario'],
            ['id' => '9b903144-d97e-47ac-907a-79cf70dc3cf7', 'nombre' => 'Vivienda y Espacios Adecuados'],
            ['id' => '9b9044b1-a1d0-42e8-b766-1216bb4d7d5e', 'nombre' => 'Investigación Científica'],
            ['id' => '9b903144-dead-4ff5-92af-27bf80173994', 'nombre' => 'Tecnología y Desarrollo Social'],
            ['id' => '9b903144-e372-4959-baaf-2e01d5f7777d', 'nombre' => 'Ingeniería y Desarrollo de Infraestructura'],
            ['id' => '9b903144-e8c8-462e-81db-ececdb36ea95', 'nombre' => 'Salud y Ciencia Aplicada'],
            ['id' => '9b903144-ed84-4ce4-9ad2-4509aa7306a6', 'nombre' => 'Nuevas tecnologías'],
            ['id' => '9b903144-f2d5-4138-ab5f-5c580b65e8b5', 'nombre' => 'Gobernanza y Política Pública'],
            ['id' => '9b903144-f794-48d7-a710-f6493e74a0f3', 'nombre' => 'Diplomacia y Cooperación Internacional'],
            ['id' => '9b903144-fc50-4c2d-bedd-4bb8b208c06c', 'nombre' => 'Desarrollo Colaborativo'],
            ['id' => '9b903145-01ca-430b-816e-042f10f27e41', 'nombre' => 'Derechos Humanos y Justicia'],
            ['id' => '9b903145-0681-4cce-a0e3-07221f1e7d56', 'nombre' => 'Ética y Responsabilidad Social'],
            ['id' => '9b903145-0bbd-4f77-ba62-f815dc47c72f', 'nombre' => 'Desarrollo Curricular'],
            ['id' => '9b903145-1081-4c62-85a5-c73ff672ddcd', 'nombre' => 'Estudios Culturales'],
            ['id' => '9b903145-15c8-47ed-af4c-c3e7abbf03e1', 'nombre' => 'Investigación en Ciencias Sociales'],
            ['id' => '9b903145-1a9a-45ef-a385-d98eb0e0e28b', 'nombre' => 'Comunicación y Medios'],
        )
            ->create();
    }
}
