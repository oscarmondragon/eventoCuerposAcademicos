<?php

namespace Database\Seeders;

use App\Models\EspacioAcademico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspacioAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EspacioAcademico::factory()->count(51)->sequence(
            ['id' => '9bc6bf2f-5fb9-4f49-8aa0-b2c7c960c60d', 'nombre' => 'Centro de Estudios e Investigación en Desarrollo Sustentable'],
            ['id' => '9bc6bf2f-6b40-4bc9-a7b2-d26dc34daf2f', 'nombre' => 'Centro de Investigación Aplicada para el Desarrollo Social'],
            ['id' => '9bc6bf2f-7367-42de-ba87-c6f699a8301b', 'nombre' => 'Centro de Investigación en Ciencias Sociales y Humanidades'],
            ['id' => '9bc6bf2f-7851-461b-8450-76776d5f5685', 'nombre' => 'Centro de Investigación Multidisciplinaria en Educación'],
            ['id' => '9bc6bf2f-7d83-434d-b889-10ceb04e4f5f', 'nombre' => 'Centro de Investigación y Estudios Avanzados de la Población'],
            ['id' => '9bc6bf2f-823f-47b8-9953-66206beaf89a', 'nombre' => 'Centro Universitario UAEM Amecameca'],
            ['id' => '9bc6bf2f-878e-4ca2-815a-2a77591c4628', 'nombre' => 'Centro Universitario UAEM Atlacomulco'],
            ['id' => '9bc6bf2f-8c50-4f4a-9a2e-0ecd6536f6cd', 'nombre' => 'Centro Universitario UAEM Ecatepec'],
            ['id' => '9bc6bf2f-91e1-4418-817a-16f0d6b4deec', 'nombre' => 'Centro Universitario UAEM Nezahualcóyotl'],
            ['id' => '9bc6bf2f-9674-4bff-b6ab-3f94cdbe3f16', 'nombre' => 'Centro Universitario UAEM Temascaltepec'],
            ['id' => '9bc6bf2f-9bc5-44ff-8077-10520e48b450', 'nombre' => 'Centro Universitario UAEM Tenancingo'],
            ['id' => '9bc6bf2f-a08b-4a16-b047-3ff1c889bda3', 'nombre' => 'Centro Universitario UAEM Texcoco'],
            ['id' => '9bc6bf2f-a5cf-40e7-b83b-4b0ec0e99511', 'nombre' => 'Centro Universitario UAEM Valle de Chalco'],
            ['id' => '9bc6bf2f-aa96-413b-ac7f-27816f88c572', 'nombre' => 'Centro Universitario UAEM Valle de México'],
            ['id' => '9bc6bf2f-c053-48ba-8368-776b04f7f9d9', 'nombre' => 'Centro Universitario UAEM Valle de Teotihuacán'],
            ['id' => '9bc6bf2f-d24e-43aa-87b0-0d47e3e86253', 'nombre' => 'Centro Universitario UAEM Zumpango'],
            ['id' => '9bc6bf2f-e141-4686-b046-dc744deb7332', 'nombre' => 'Escuela De Artes Escénicas'],
            ['id' => '9bc6bf2f-eb19-45a2-af85-25d5390be1d6', 'nombre' => 'Instituto de Ciencias Agropecuarias y Rurales'],
            ['id' => '9bc6bf2f-f4eb-435b-8e24-afdd8ad4fdf1', 'nombre' => 'Instituto de Estudios sobre la Universidad'],
            ['id' => '9bc6bf2f-fa71-4461-94b3-a60f1f74dffb', 'nombre' => 'Instituto Interamericano de Tecnología y Ciencias del Agua'],
            ['id' => '9bc6bf2f-ff12-48e9-b26e-e44af90d47d2', 'nombre' => 'Plantel Ángel Ma. Garibay kintana'],
            ['id' => '9bc6bf30-0449-4c77-845f-2bcfbbc66ae1', 'nombre' => 'Plantel Cuauhtémoc'],
            ['id' => '9bc6bf30-090e-437f-87ae-53598af946b7', 'nombre' => 'Plantel Dr. Pablo González Casanova'],
            ['id' => '9bc6bf30-0e64-4916-938b-ebe2c3b53a6f', 'nombre' => 'Plantel Ignacio Ramírez Calzada'],
            ['id' => '9bc6bf30-133c-403c-be7f-9b56ad6bf609', 'nombre' => 'Plantel Isidro Fabela Alfaro de la Escuela Preparatoria Atlacomulco'],
            ['id' => '9bc6bf30-1876-4d7c-a9dd-fa4a6778082e', 'nombre' => 'Plantel Lic. Adolfo López Mateos'],
            ['id' => '9bc6bf30-1d35-4bef-ad3b-9f4c1c682473', 'nombre' => 'Plantel Nezahualcóyotl'],
            ['id' => '9bc6bf30-2286-43b9-8d73-40832072a850', 'nombre' => 'Unidad Académica Profesional de Cuautitlan Izcalli'],
            ['id' => '9bc6bf30-275f-43a9-abc5-978c0d6d8dbf', 'nombre' => 'Unidad Académica Profesional Tejupilco'],
            ['id' => '9bc6bf30-2ccd-45dd-9288-a00d60fda072', 'nombre' => 'Unidad Académica Profesional Tianguistenco'],
            ['id' => '9bc6bf30-316a-45ed-9be7-19e540b81078', 'nombre' => 'Facultad de Antropología'],
            ['id' => '9bc6bf30-362c-4599-9f10-e0dfd04d79d2', 'nombre' => 'Facultad de Arquitectura y Diseño'],
            ['id' => '9bc6bf30-3bc0-46a4-8156-6c039e6893ed', 'nombre' => 'Facultad de Artes'],
            ['id' => '9bc6bf30-436e-48d0-a848-bede3797c3cd', 'nombre' => 'Facultad de Ciencias'],
            ['id' => '9bc6bf30-48de-40b7-8a1f-71a9dbb80542', 'nombre' => 'Facultad de Ciencias Agrícolas'],
            ['id' => '9bc6bf30-4d81-4c6f-a2a4-e79187f22888', 'nombre' => 'Facultad de Ciencias de la Conducta'],
            ['id' => '9bc6bf30-52ca-42e6-a352-9450e3f05957', 'nombre' => 'Facultad de Ciencias Políticas y Sociales'],
            ['id' => '9bc6bf30-5799-4fab-a045-a8a3c0865683', 'nombre' => 'Facultad de Contaduría y Administración'],
            ['id' => '9bc6bf30-5ce6-4c30-928a-22539dacdf0c', 'nombre' => 'Facultad de Derecho'],
            ['id' => '9bc6bf30-61c4-4074-b4e5-3c858a5c062a', 'nombre' => 'Facultad de Economía'],
            ['id' => '9bc6bf30-66e5-431e-9b94-4532ed845a14', 'nombre' => 'Facultad de Enfermería y Obstetricia'],
            ['id' => '9bc6bf30-6bb3-4ee0-add1-3adcf9285145', 'nombre' => 'Facultad de Geografía'],
            ['id' => '9bc6bf30-7101-474d-a9ad-3d79d2ee1104', 'nombre' => 'Facultad de Humanidades'],
            ['id' => '9bc6bf30-75cd-41bb-a715-8f8f3f9e569b', 'nombre' => 'Facultad de Ingeniería'],
            ['id' => '9bc6bf30-7b18-422e-933b-8d15fa006527', 'nombre' => 'Facultad de Lenguas'],
            ['id' => '9bc6bf30-7fda-4558-9584-f8dc9a597f98', 'nombre' => 'Facultad de Medicina'],
            ['id' => '9bc6bf30-8519-4e96-95fb-af7d1a89c86c', 'nombre' => 'Facultad de Medicina Veterinaria y Zootecnia'],
            ['id' => '9bc6bf30-8a29-45a2-a9f3-a0c9a49e46f4', 'nombre' => 'Facultad de Odontología'],
            ['id' => '9bc6bf30-8eac-4c4c-ba1d-10800a52912b', 'nombre' => 'Facultad de Planeación Urbana y Regional'],
            ['id' => '9bc6bf30-9402-4a05-9f5a-fab25a231474', 'nombre' => 'Facultad de Química'],
            ['id' => '9bc6bf30-98d2-4d4a-a320-e273b0c4d17e', 'nombre' => 'Facultad de Turismo y Gastronomía'],
        )->create();
    }
}
