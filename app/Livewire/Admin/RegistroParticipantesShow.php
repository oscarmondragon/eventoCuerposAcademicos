<?php

namespace App\Livewire\Admin;

use App\Models\Registro;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('layouts.app')]

class RegistroParticipantesShow extends Component
{
    use WithPagination;

    public function render()
    {



        $registros = Registro::select();

        return view(
            'livewire.admin.registro-participantes-show',
            ['registros' => $registros->paginate(5, pageName: 'registros')]
        );

    }
}
