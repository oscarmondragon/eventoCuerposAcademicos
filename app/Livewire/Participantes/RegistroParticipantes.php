<?php

namespace App\Livewire\Participantes;

use App\Livewire\Forms\ParticipantesForm;
use App\Models\Area;
use App\Models\Subarea;
use App\Models\TipoLider;
use Livewire\Component;
use Livewire\Attributes\Layout;

class RegistroParticipantes extends Component
{

    public $selectedSubareas = [];
    public ParticipantesForm $form;

    #[Layout('layouts.publico')]
    public function render()
    {
        $subareasOptions = [];
        if ($this->form->areasSeleccionadas) {
            $subareasOptions = Subarea::where('area_id', '=', $this->form->areasSeleccionadas)->get();
        }
        $areasOptions = Area::all();

        $tiposFiltro = [];

        if ($this->form->tipoRegistro == '1') {
            $tiposFiltro = TipoLider::where('tipo_solicitante', 'Interno')->get();
        } elseif ($this->form->tipoRegistro == '2') {
            $tiposFiltro = TipoLider::where('tipo_solicitante', 'Externo')->get();
        } else {
            $tiposFiltro = [];
        }

        return view('livewire.participantes.registro-participantes', ['tipos_lider' => $tiposFiltro, 'subareasOptions' => $subareasOptions, 'areasOptions' => $areasOptions]);
    }
    public function save()
    {
        $this->form->store();

        return $this->redirect('/registro-participantes');
    }

    public function selectOption($subarea)
    {

        if (in_array($subarea, $this->selectedSubareas)) {
            $this->selectedSubareas = array_diff($this->selectedSubareas, [$subarea]);
        } else {
            $this->selectedSubareas[] = json_decode($subarea, true);
        }
    }
}
