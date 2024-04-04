<?php

namespace App\Livewire\Participantes;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.publico')]
class RegistroCreadoMensaje extends Component
{
    public function render()
    {
        return view('livewire.participantes.registro-creado-mensaje');
    }
}
