<?php

namespace App\Livewire\Participantes;

use App\Enums\TiposForm;
use App\Livewire\Forms\AsistentesForm;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;


class RegistroAsistentes extends Component
{
    use WithFileUploads;

    public $tipos;
    public AsistentesForm $form;

    public $listeners = [
        'save'
    ];

    #[Layout('layouts.publico')]

    public function mount()
    {
        $this->tipos = TiposForm::cases();
    }

    public function render()
    {
        return view('livewire.participantes.registro-asistentes');
    }

    public function save()
    {
        $this->form->store();
        //$this->limpiarCampos();
    }
}
