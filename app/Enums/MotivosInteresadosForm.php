<?php

namespace App\Enums;

enum MotivosInteresadosForm: string
{
    case IMC = 'Integración de miembro o colaborador';
    case FRGI = 'Formación de red o grupo de investigación';
    case DCPI = 'Desarrollo conjunto de proyectos de investigación';
    case OCAACT = 'Organización conjunta de actividades académicas, científicas y tecnológicas';
    case IIAUC = 'Intercambio de información para el acceso universal al conocimiento';
    case MPA = 'Movilidad de profesores y alumnos (estancias, prácticas, estadías, etc.)';
    case F = 'Financiamiento';
    case TT = 'Transferencia de tecnología';
    case C = 'Capacitación';
    case BT = 'Bolsa de trabajo';
    case O = 'Otro';
}
