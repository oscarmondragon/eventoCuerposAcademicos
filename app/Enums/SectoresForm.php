<?php

namespace App\Enums;

enum SectoresForm: string
{

    use BaseEnum;

    case S = 'Social';
    case EMP = 'Empresarial';
    case G = 'Gubernamental';
    case E = 'Educativo';
    case O = 'Otro';
}
