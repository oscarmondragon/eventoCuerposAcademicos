<?php

namespace App\Livewire\Participantes;

use App\Models\Area;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.publico')]

class RegistroAsistentes extends Component
{

    public $areasTematicas;

    public function mount()
    {
        $this->areasTematicas = Area::all();
    }

    public function render()
    {
        return view('livewire.participantes.registro-asistentes');
    }
}
