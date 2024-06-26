<?php

namespace App\Enums;

enum InteresesForm: string
{
    use BaseEnum;

    case RF = 'Reunión formal';
    case FCI = 'Firma de carta de intención';
    case FC = 'Firma de convenio';
}
