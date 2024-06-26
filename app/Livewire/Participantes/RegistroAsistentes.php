<?php

namespace App\Livewire\Participantes;

use App\Enums\TiposForm;
use App\Livewire\Forms\AsistentesForm;
use Livewire\Component;
use Livewire\Attributes\Layout;


class RegistroAsistentes extends Component
{


    public $tipos;
    public AsistentesForm $form;


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

        return redirect('/registro-creado')->with('success', 'Sus datos han sido guardados correctamente.');
    }

    public function resetFields()
    {
        $this->form->resetFields();
    }
}
