<?php

namespace Database\Seeders;

use App\Models\TipoLider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoLiderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoLider::factory()->count(13)->sequence(
            // INTERNO
            ['id' => '9b922754-316e-432a-9e25-06d1bb7dee0a', 'nombre' => 'Líder de Cuerpo Académico con registro PRODEP ', 'tipo_solicitante' => 'Interno'],
            ['id' => '9b922754-4fd2-43f2-a114-1847af35cd29', 'nombre' => 'Líder de Cuerpo Académico con registro UAEMEX', 'tipo_solicitante' => 'Interno'],
            ['id' => '9b922754-699e-4512-a383-04c96986cd29', 'nombre' => 'Coordinador de Red', 'tipo_solicitante' => 'Interno'],
            ['id' => '9b922754-7cfb-40ab-8e19-d24ee6166772', 'nombre' => 'Representante de grupo de Investigación', 'tipo_solicitante' => 'Interno'],
            // EXTERNO
            ['id' => '9b922754-a76b-4570-85f1-1f5454b2d95d', 'nombre' => 'Servidor Público de gobierno municipal', 'tipo_solicitante' => 'Externo'],
            ['id' => '9b922754-f57b-4e32-92dc-1e4d31afb693', 'nombre' => 'Servidor público de gobierno estatal', 'tipo_solicitante' => 'Externo'],
            ['id' => '9b922755-c8b0-40bb-b98b-7462c7925186', 'nombre' => 'Servidor público de gobierno federal', 'tipo_solicitante' => 'Externo'],
            ['id' => '9b922756-1b38-4c82-b5d8-731e7728e164', 'nombre' => 'Representante del sector Social nacionales', 'tipo_solicitante' => 'Externo'],
            ['id' => '9b922756-44bf-444c-8e61-a872b3284c8f', 'nombre' => 'Representante del sector Social extranjero', 'tipo_solicitante' => 'Externo'],
            ['id' => '9b922756-6872-4df4-8e56-248943d3f0dd', 'nombre' => 'Productivo del sector Social nacionales', 'tipo_solicitante' => 'Externo'],
            ['id' => '9b922756-828e-4404-806e-d004ed986caf', 'nombre' => 'Productivo del sector Social extranjero', 'tipo_solicitante' => 'Externo'],
            ['id' => '9b922756-9c78-4f43-ad0e-1e9d7ec7ab85', 'nombre' => 'Empresarial del sector Social nacionales', 'tipo_solicitante' => 'Externo'],
            ['id' => '9b922756-b337-443c-b7ec-4a3cfabf741e', 'nombre' => 'Empresarial del sector Social extranjero', 'tipo_solicitante' => 'Externo'],
        )->create();
    }
}
