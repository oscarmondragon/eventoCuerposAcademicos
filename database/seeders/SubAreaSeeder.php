<?php

namespace Database\Seeders;

use App\Models\Subarea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subarea::factory()->count(73)->sequence(
            // GRUPO 1
            ['area_id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'grupo_id' => '9b903144-8fb2-4480-938b-1083d48ffaa2', 'nombre' => 'Acceso a recursos básicos'],
            ['area_id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'grupo_id' => '9b903144-8fb2-4480-938b-1083d48ffaa2', 'nombre' => 'Microfinanzas y desarrollo económico local'],
            ['area_id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'grupo_id' => '9b903144-8fb2-4480-938b-1083d48ffaa2', 'nombre' => 'Reducción de desigualdades'],

            ['area_id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'grupo_id' => '9b903144-ac97-45b1-9054-30579e08c925', 'nombre' => 'Agricultura sostenible'],
            ['area_id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'grupo_id' => '9b903144-ac97-45b1-9054-30579e08c925', 'nombre' => 'Hambre cero'],
            ['area_id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'grupo_id' => '9b903144-ac97-45b1-9054-30579e08c925', 'nombre' => 'Soberanía alimentaria'],

            ['area_id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'grupo_id' => '9b903144-b10d-4d83-ae84-9dc36967530c', 'nombre' => 'Control de agentes contaminantes'],
            ['area_id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'grupo_id' => '9b903144-b10d-4d83-ae84-9dc36967530c', 'nombre' => 'Conservación de recursos naturales'],
            ['area_id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'grupo_id' => '9b903144-b10d-4d83-ae84-9dc36967530c', 'nombre' => 'Energías renovables y sostenibles'],

            ['area_id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'grupo_id' => '9b903144-b669-4e6c-8535-f9416bd4aae7', 'nombre' => 'Planificación urbana'],
            ['area_id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'grupo_id' => '9b903144-b669-4e6c-8535-f9416bd4aae7', 'nombre' => 'Infraestructura resiliente'],
            ['area_id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'grupo_id' => '9b903144-b669-4e6c-8535-f9416bd4aae7', 'nombre' => 'Movilidad sostenible'],

            ['area_id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'grupo_id' => '9b903144-bb30-4176-836c-21ca2ac27f5b', 'nombre' => 'Mitigación y adaptación al cambio climático'],
            ['area_id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'grupo_id' => '9b903144-bb30-4176-836c-21ca2ac27f5b', 'nombre' => 'Preservación de ecosistemas'],
            ['area_id' => '9b9027b5-8a87-402c-8f0a-75002db35b7d', 'grupo_id' => '9b903144-bb30-4176-836c-21ca2ac27f5b', 'nombre' => 'Educación ambiental'],

            // GRUPO 2
            ['area_id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'grupo_id' => '9b903144-c0d1-4c0f-ab8c-2b4b9885fe54', 'nombre' => 'Acceso a servicios de salud'],
            ['area_id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'grupo_id' => '9b903144-c0d1-4c0f-ab8c-2b4b9885fe54', 'nombre' => 'Salud mental'],
            ['area_id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'grupo_id' => '9b903144-c0d1-4c0f-ab8c-2b4b9885fe54', 'nombre' => 'Salud materno-infantil'],

            ['area_id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'grupo_id' => '9b903144-c547-4b16-acbb-02417c6f4bf4', 'nombre' => 'Educación inclusiva'],
            ['area_id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'grupo_id' => '9b903144-c547-4b16-acbb-02417c6f4bf4', 'nombre' => 'Innovación educativa'],
            ['area_id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'grupo_id' => '9b903144-c547-4b16-acbb-02417c6f4bf4', 'nombre' => 'Formación continua'],

            ['area_id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'grupo_id' => '9b903144-ca76-4ec3-987e-c3d97503b5f7', 'nombre' => 'Empoderamiento femenino'],
            ['area_id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'grupo_id' => '9b903144-ca76-4ec3-987e-c3d97503b5f7', 'nombre' => 'Derechos de la mujer'],
            ['area_id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'grupo_id' => '9b903144-ca76-4ec3-987e-c3d97503b5f7', 'nombre' => 'Participación política y social'],

            ['area_id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'grupo_id' => '9b903144-cf50-49f1-8fea-ab3f35e77d9b', 'nombre' => 'Bienestar emocional'],
            ['area_id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'grupo_id' => '9b903144-cf50-49f1-8fea-ab3f35e77d9b', 'nombre' => 'Fortalecimiento comunitario'],
            ['area_id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'grupo_id' => '9b903144-cf50-49f1-8fea-ab3f35e77d9b', 'nombre' => 'Cultura y desarrollo humano'],

            ['area_id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'grupo_id' => '9b903144-d97e-47ac-907a-79cf70dc3cf7', 'nombre' => 'Acceso a vivienda digna'],
            ['area_id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'grupo_id' => '9b903144-d97e-47ac-907a-79cf70dc3cf7', 'nombre' => 'Urbanismo social'],
            ['area_id' => '9b902a68-8f0f-427a-baa6-5abffb160a08', 'grupo_id' => '9b903144-d97e-47ac-907a-79cf70dc3cf7', 'nombre' => 'Desarrollo rural'],

            // GRUPO 3
            ['area_id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'grupo_id' => '9b9044b1-a1d0-42e8-b766-1216bb4d7d5e', 'nombre' => 'Avances en ciencia básica'],
            ['area_id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'grupo_id' => '9b9044b1-a1d0-42e8-b766-1216bb4d7d5e', 'nombre' => 'Investigación aplicada'],
            ['area_id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'grupo_id' => '9b9044b1-a1d0-42e8-b766-1216bb4d7d5e', 'nombre' => 'Innovación tecnológica'],

            ['area_id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'grupo_id' => '9b903144-dead-4ff5-92af-27bf80173994', 'nombre' => 'Tecnología para la inclusión'],
            ['area_id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'grupo_id' => '9b903144-dead-4ff5-92af-27bf80173994', 'nombre' => 'Acceso a la tecnología'],
            ['area_id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'grupo_id' => '9b903144-dead-4ff5-92af-27bf80173994', 'nombre' => 'Tecnología para el desarrollo comunitario'],

            ['area_id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'grupo_id' => '9b903144-e372-4959-baaf-2e01d5f7777d', 'nombre' => 'Infraestructuras sostenibles'],
            ['area_id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'grupo_id' => '9b903144-e372-4959-baaf-2e01d5f7777d', 'nombre' => 'Ingeniería para el desarrollo rural'],
            ['area_id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'grupo_id' => '9b903144-e372-4959-baaf-2e01d5f7777d', 'nombre' => 'Desarrollo e innovación en maquinaria y equipos'],

            ['area_id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'grupo_id' => '9b903144-e8c8-462e-81db-ececdb36ea95', 'nombre' => 'Investigación médica'],
            ['area_id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'grupo_id' => '9b903144-e8c8-462e-81db-ececdb36ea95', 'nombre' => 'Desarrollo de vacunas y medicamentos'],
            ['area_id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'grupo_id' => '9b903144-e8c8-462e-81db-ececdb36ea95', 'nombre' => 'Tecnologías médicas innovadoras'],

            ['area_id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'grupo_id' => '9b903144-ed84-4ce4-9ad2-4509aa7306a6', 'nombre' => 'Robótica aplicada'],
            ['area_id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'grupo_id' => '9b903144-ed84-4ce4-9ad2-4509aa7306a6', 'nombre' => 'Inteligencia artificial'],
            ['area_id' => '9b902a68-9a00-47c5-ac84-830b32daa9e9', 'grupo_id' => '9b903144-ed84-4ce4-9ad2-4509aa7306a6', 'nombre' => 'Tecnologías emergentes'],

            // GRUPO 4
            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903144-f2d5-4138-ab5f-5c580b65e8b5', 'nombre' => 'Políticas sostenibles'],
            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903144-f2d5-4138-ab5f-5c580b65e8b5', 'nombre' => 'Transparencia gubernamental'],
            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903144-f2d5-4138-ab5f-5c580b65e8b5', 'nombre' => 'Participación ciudadana'],

            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903144-f794-48d7-a710-f6493e74a0f3', 'nombre' => 'Diplomacia preventiva'],
            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903144-f794-48d7-a710-f6493e74a0f3', 'nombre' => 'Cooperación en crisis humanitarias'],
            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903144-f794-48d7-a710-f6493e74a0f3', 'nombre' => 'Relaciones internacionales'],

            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903144-fc50-4c2d-bedd-4bb8b208c06c', 'nombre' => 'Alianzas público-privadas'],
            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903144-fc50-4c2d-bedd-4bb8b208c06c', 'nombre' => 'Desarrollo comunitario participativo'],
            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903144-fc50-4c2d-bedd-4bb8b208c06c', 'nombre' => 'Cooperación multilateral'],

            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903145-01ca-430b-816e-042f10f27e41', 'nombre' => 'Justicia social'],
            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903145-01ca-430b-816e-042f10f27e41', 'nombre' => 'Derechos civiles y políticos'],
            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903145-01ca-430b-816e-042f10f27e41', 'nombre' => 'Derechos de minorías'],

            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903145-0681-4cce-a0e3-07221f1e7d56', 'nombre' => 'Ética profesional y social'],
            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903145-0681-4cce-a0e3-07221f1e7d56', 'nombre' => 'Responsabilidad corporativa y social'],
            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903145-0681-4cce-a0e3-07221f1e7d56', 'nombre' => 'Participación cívica'],
            ['area_id' => '9b902a68-9ec4-4dc6-a192-6e6fbe96f705', 'grupo_id' => '9b903145-0681-4cce-a0e3-07221f1e7d56', 'nombre' => 'Bioética'],

            // GRUPO 5
            ['area_id' => '9b902a68-a40b-4c31-9eb8-f2d395fdac61', 'grupo_id' => '9b903145-0bbd-4f77-ba62-f815dc47c72f', 'nombre' => 'Metodologías educativas'],
            ['area_id' => '9b902a68-a40b-4c31-9eb8-f2d395fdac61', 'grupo_id' => '9b903145-0bbd-4f77-ba62-f815dc47c72f', 'nombre' => 'Aprendizaje basado en proyectos'],
            ['area_id' => '9b902a68-a40b-4c31-9eb8-f2d395fdac61', 'grupo_id' => '9b903145-0bbd-4f77-ba62-f815dc47c72f', 'nombre' => 'Evaluación educativa'],

            ['area_id' => '9b902a68-a40b-4c31-9eb8-f2d395fdac61', 'grupo_id' => '9b903145-1081-4c62-85a5-c73ff672ddcd', 'nombre' => 'Preservación del patrimonio cultural'],
            ['area_id' => '9b902a68-a40b-4c31-9eb8-f2d395fdac61', 'grupo_id' => '9b903145-1081-4c62-85a5-c73ff672ddcd', 'nombre' => 'Interculturalidad'],
            ['area_id' => '9b902a68-a40b-4c31-9eb8-f2d395fdac61', 'grupo_id' => '9b903145-1081-4c62-85a5-c73ff672ddcd', 'nombre' => 'Arte y creatividad'],

            ['area_id' => '9b902a68-a40b-4c31-9eb8-f2d395fdac61', 'grupo_id' => '9b903145-15c8-47ed-af4c-c3e7abbf03e1', 'nombre' => 'Análisis sociológicos'],
            ['area_id' => '9b902a68-a40b-4c31-9eb8-f2d395fdac61', 'grupo_id' => '9b903145-15c8-47ed-af4c-c3e7abbf03e1', 'nombre' => 'Estudios antropológicos'],
            ['area_id' => '9b902a68-a40b-4c31-9eb8-f2d395fdac61', 'grupo_id' => '9b903145-15c8-47ed-af4c-c3e7abbf03e1', 'nombre' => 'Ciencias políticas y económicas'],

            ['area_id' => '9b902a68-a40b-4c31-9eb8-f2d395fdac61', 'grupo_id' => '9b903145-1a9a-45ef-a385-d98eb0e0e28b', 'nombre' => 'Comunicación para el cambio social'],
            ['area_id' => '9b902a68-a40b-4c31-9eb8-f2d395fdac61', 'grupo_id' => '9b903145-1a9a-45ef-a385-d98eb0e0e28b', 'nombre' => 'Periodismo ético'],
            ['area_id' => '9b902a68-a40b-4c31-9eb8-f2d395fdac61', 'grupo_id' => '9b903145-1a9a-45ef-a385-d98eb0e0e28b', 'nombre' => 'Medios y sociedad'],
        )
            ->create();
    }
}
