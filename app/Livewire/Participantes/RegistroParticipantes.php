<?php

namespace App\Livewire\Participantes;

use App\Livewire\Forms\ParticipantesForm;
use App\Models\TipoLider;
use Livewire\Component;
use Livewire\Attributes\Layout;

class RegistroParticipantes extends Component
{

    public $options = ['Opción 1', 'Opción 2', 'Opción 3'];
    public $selectedOptions = [];
    public ParticipantesForm $form;

    #[Layout('layouts.publico')]
    public function render()
    {

        $tiposFiltro = [];

        if ($this->form->tipoRegistro == '1') {
            $tiposFiltro = TipoLider::where('tipo_solicitante', 'Interno')->get();
        } elseif ($this->form->tipoRegistro == '2') {
            $tiposFiltro = TipoLider::where('tipo_solicitante', 'Externo')->get();
        } else {
            $tiposFiltro = [];
        }

        return view('livewire.participantes.registro-participantes', ['tipos_lider' => $tiposFiltro]);
    }
    public function save()
    {
        $this->form->store();

        return $this->redirect('/registro-participantes');
    }

    public function selectOption($option)
    {
        if (in_array($option, $this->selectedOptions)) {
            $this->selectedOptions = array_diff($this->selectedOptions, [$option]);
        } else {
            $this->selectedOptions[] = $option;
        }
    }
}
