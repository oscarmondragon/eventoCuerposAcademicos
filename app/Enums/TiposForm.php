<?php

namespace App\Enums;

enum TiposForm: string
{
    case EM = 'Empresa';
    case GO = 'Gobierno';
    case ES = 'Estudiante';
    case AC = 'Asociación civil';
    case P = 'Productor';
    case A = 'Academia';
    case OT = 'Otro';
}
