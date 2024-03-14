<?php

namespace App\Livewire\Participantes;

use App\Livewire\Forms\ParticipantesForm;
use App\Models\TipoLider;
use Livewire\Component;
use Livewire\Attributes\Layout;

class RegistroParticipantes extends Component
{

    public ParticipantesForm $form;

    #[Layout('layouts.publico')]
    public function render()
    {

        $tiposFiltro = [];

        if ($this->form->tipo_registro == '1') {
            $tiposFiltro = TipoLider::where('tipo_solicitante', 'Interno')->get();
        } elseif ($this->form->tipo_registro == '2') {
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
}
