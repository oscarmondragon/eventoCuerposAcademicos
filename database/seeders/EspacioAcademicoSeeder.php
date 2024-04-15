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
            ['id' => '9bca81af-072c-424d-a0ed-e285d55f03e8', 'cve_c_costos' => 10308, 'nombre' => 'CENTRO DE ESTUDIOS E INVESTIGACIÓN EN DESARROLLO SUSTENTABLE'],
            ['id' => '9bca81af-10a6-4fe3-a822-0c0fe6193c43', 'cve_c_costos' => 10315, 'nombre' => 'CENTRO DE INVESTIGACIÓN APLICADA PARA EL DESARROLLO SOCIAL'],
            ['id' => '9bca81af-1896-46ef-a6be-193ab15a0bca', 'cve_c_costos' => 10304, 'nombre' => 'CENTRO DE INVESTIGACIÓN EN CIENCIAS SOCIALES Y HUMANIDADES'],
            ['id' => '9bca81af-1e05-4a87-b89b-f299efacc0e4', 'cve_c_costos' => 10312, 'nombre' => 'CENTRO DE INVESTIGACIÓN MULTIDISCIPLINARIA EN EDUCACIÓN'],
            ['id' => '9bca81af-25cd-4666-89e1-ce6398b84b93', 'cve_c_costos' => 10305, 'nombre' => 'CENTRO DE INVESTIGACIÓN Y ESTUDIOS AVANZADOS DE LA POBLACIÓN'],
            ['id' => '9bca81af-2b2d-4944-83ef-34a7b5c6beaa', 'cve_c_costos' => 30201, 'nombre' => 'CENTRO UNIVERSITARIO UAEM AMECAMECA'],
            ['id' => '9bca81af-2fcd-482f-8829-d7752e69260c', 'cve_c_costos' => 30101, 'nombre' => 'CENTRO UNIVERSITARIO UAEM ATLACOMULCO'],
            ['id' => '9bca81af-351a-4d2f-b13a-90261784568d', 'cve_c_costos' => 30601, 'nombre' => 'CENTRO UNIVERSITARIO UAEM ECATEPEC'],
            ['id' => '9bca81af-39ea-4fbd-8830-81393efe8b58', 'cve_c_costos' => 31101, 'nombre' => 'CENTRO UNIVERSITARIO UAEM NEZAHUALCÓYOTL'],
            ['id' => '9bca81af-3f38-40cb-b53d-ca4a2a059e2a', 'cve_c_costos' => 30901, 'nombre' => 'CENTRO UNIVERSITARIO UAEM TEMASCALTEPEC'],
            ['id' => '9bca81af-4437-42e0-958a-26eec908e51b', 'cve_c_costos' => 31001, 'nombre' => 'CENTRO UNIVERSITARIO UAEM TENANCINGO'],
            ['id' => '9bca81af-4947-4589-9f7a-57317dd1c5f6', 'cve_c_costos' => 30401, 'nombre' => 'CENTRO UNIVERSITARIO UAEM TEXCOCO'],
            ['id' => '9bca81af-4e18-4dec-95f8-9459f4ff5575', 'cve_c_costos' => 30701, 'nombre' => 'CENTRO UNIVERSITARIO UAEM VALLE DE CHALCO'],
            ['id' => '9bca81af-5351-4033-b718-9ded7a285cd9', 'cve_c_costos' => 30501, 'nombre' => 'CENTRO UNIVERSITARIO UAEM VALLE DE MÉXICO'],
            ['id' => '9bca81af-581e-4f53-b78c-30de2ed384be', 'cve_c_costos' => 30801, 'nombre' => 'CENTRO UNIVERSITARIO UAEM VALLE DE TEOTIHUACÁN'],
            ['id' => '9bca81af-5ceb-4b72-a0bf-71fee5036d2c', 'cve_c_costos' => 30301, 'nombre' => 'CENTRO UNIVERSITARIO UAEM ZUMPANGO'],
            ['id' => '9bca81af-6239-433a-8971-8da41424ccf2', 'cve_c_costos' => 22201, 'nombre' => 'ESCUELA DE ARTES ESCÉNICAS'],
            ['id' => '9bca81af-6700-44ea-80d8-011581a8828f', 'cve_c_costos' => 21701, 'nombre' => 'FACULTAD DE ANTROPOLOGÍA'],
            ['id' => '9bca81af-6c53-49fe-995e-51425c59fca3', 'cve_c_costos' => 20601, 'nombre' => 'FACULTAD DE ARQUITECTURA Y DISEÑO'],
            ['id' => '9bca81af-7106-44a5-8615-eb945c3c9167', 'cve_c_costos' => 22001, 'nombre' => 'FACULTAD DE ARTES'],
            ['id' => '9bca81af-764b-4455-9761-61070e8ae255', 'cve_c_costos' => 21901, 'nombre' => 'FACULTAD DE CIENCIAS'],
            ['id' => '9bca81af-7b26-47f4-b9b2-5d5b2ff5b92f', 'cve_c_costos' => 21301, 'nombre' => 'FACULTAD DE CIENCIAS AGRÍCOLAS'],
            ['id' => '9bca81af-805f-43db-bbc9-e0fbc1f2fb9d', 'cve_c_costos' => 21501, 'nombre' => 'FACULTAD DE CIENCIAS DE LA CONDUCTA'],
            ['id' => '9bca81af-8561-4ef2-a8bd-89412e99ee61', 'cve_c_costos' => 21001, 'nombre' => 'FACULTAD DE CIENCIAS POLÍTICAS Y SOCIALES'],
            ['id' => '9bca81af-8dc0-491d-8609-c1048c4db299', 'cve_c_costos' => 20801, 'nombre' => 'FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN'],
            ['id' => '9bca81af-92aa-4290-9645-aafde974fb3d', 'cve_c_costos' => 20701, 'nombre' => 'FACULTAD DE DERECHO'],
            ['id' => '9bca81af-97d0-4a37-a16a-dfe0c4ec2586', 'cve_c_costos' => 21101, 'nombre' => 'FACULTAD DE ECONOMÍA'],
            ['id' => '9bca81af-9c81-4223-9cf2-8a01dd21e725', 'cve_c_costos' => 20301, 'nombre' => 'FACULTAD DE ENFERMERÍA Y OBSTETRICIA'],
            ['id' => '9bca81af-a1d0-4086-ad21-a6fc40448ad9', 'cve_c_costos' => 21201, 'nombre' => 'FACULTAD DE GEOGRAFÍA'],
            ['id' => '9bca81af-a6a5-4fae-8176-38af4b30168c', 'cve_c_costos' => 20901, 'nombre' => 'FACULTAD DE HUMANIDADES'],
            ['id' => '9bca81af-ab66-4892-bd06-e7caecd14aea', 'cve_c_costos' => 20501, 'nombre' => 'FACULTAD DE INGENIERÍA'],
            ['id' => '9bca81af-b0af-42f8-bbb3-09727a819add', 'cve_c_costos' => 22101, 'nombre' => 'FACULTAD DE LENGUAS'],
            ['id' => '9bca81af-b56d-4804-a3b1-04a387553f14', 'cve_c_costos' => 20201, 'nombre' => 'FACULTAD DE MEDICINA'],
            ['id' => '9bca81af-bac9-4c6f-96bf-c6fb4b854b78', 'cve_c_costos' => 21401, 'nombre' => 'FACULTAD DE MEDICINA VETERINARIA Y ZOOTECNIA'],
            ['id' => '9bca81af-bf84-435c-87f6-19e543d9fc05', 'cve_c_costos' => 20101, 'nombre' => 'FACULTAD DE ODONTOLOGÍA'],
            ['id' => '9bca81af-c4eb-494a-825e-a1ed1d42e85e', 'cve_c_costos' => 21801, 'nombre' => 'FACULTAD DE PLANEACIÓN URBANA Y REGIONAL'],
            ['id' => '9bca81af-c9a4-48e9-8465-55934e2ef90b', 'cve_c_costos' => 20401, 'nombre' => 'FACULTAD DE QUÍMICA'],
            ['id' => '9bca81af-ceed-44cf-8216-a6fac969a092', 'cve_c_costos' => 21601, 'nombre' => 'FACULTAD DE TURISMO Y GASTRONOMÍA'],
            ['id' => '9bca81af-d3d6-48d5-91a9-bfe24f2b6be0', 'cve_c_costos' => 10303, 'nombre' => 'INSTITUTO DE CIENCIAS AGROPECUARIAS Y RURALES'],
            ['id' => '9bca81af-d8ef-4ff1-8d4a-103126260835', 'cve_c_costos' => 10302, 'nombre' => 'INSTITUTO DE ESTUDIOS SOBRE LA UNIVERSIDAD'],
            ['id' => '9bca81af-ddb9-47b5-8213-c1bc2155a965', 'cve_c_costos' => 22301, 'nombre' => 'INSTITUTO INTERAMERICANO DE TECNOLOGÍA Y CIENCIAS DEL AGUA'],
            ['id' => '9bca81af-e320-48bf-b68e-718fe870af1c', 'cve_c_costos' => 40501, 'nombre' => 'PLANTEL ÁNGEL MA. GARIBAY KINTANA DE LA ESCUELA PREPARATORIA'],
            ['id' => '9bca81af-e7dd-4d60-947a-cb2cd1592d56', 'cve_c_costos' => 40301, 'nombre' => 'PLANTEL CUAUHTÉMOC DE LA ESCUELA PREPARATORIA'],
            ['id' => '9bca81af-ed38-4559-9093-45f15bf17db8', 'cve_c_costos' => 40601, 'nombre' => 'PLANTEL DR. PABLO GONZÁLEZ CASANOVA DE LA ESCUELA PREPARATORIA'],
            ['id' => '9bca81af-f52a-41bd-af06-da10b41a710d', 'cve_c_costos' => 40401, 'nombre' => 'PLANTEL IGNACIO RAMÍREZ CALZADA DE LA ESCUELA PREPARATORIA'],
            ['id' => '9bca81af-faa3-4f09-9626-b0226c8da0a6', 'cve_c_costos' => 40901, 'nombre' => 'PLANTEL ISIDRO FABELA ALFARO DE LA ESCUELA PREPARATORIA'],
            ['id' => '9bca81af-ff56-4602-94d8-e42d132392bf', 'cve_c_costos' => 40101, 'nombre' => 'PLANTEL LIC. ADOLFO LOPEZ MATEOS DE LA ESCUELA PREPARATORIA'],
            ['id' => '9bca81b0-03ec-4ccb-84ef-6489f4cb2df0', 'cve_c_costos' => 40201, 'nombre' => 'PLANTEL NEZAHUALCOYOTL DE LA ESCUELA PREPARATORIA'],
            ['id' => '9bca81b0-093a-40c8-bbe6-62a31d608339', 'cve_c_costos' => 31401, 'nombre' => 'UNIDAD ACADÉMICA PROFESIONAL DE CUAUTITLAN IZCALLI'],
            ['id' => '9bca81b0-0e06-4867-8c18-04809b770624', 'cve_c_costos' => 31601, 'nombre' => 'UNIDAD ACADÉMICA PROFESIONAL TEJUPILCO'],
            ['id' => '9bca81b0-134e-4f2a-8905-55c76173a899', 'cve_c_costos' => 31201, 'nombre' => 'UNIDAD ACADÉMICA PROFESIONAL TIANGUISTENCO'],

        )->create();
    }
}
