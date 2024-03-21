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
    public $areaSeleccionada;


    public ParticipantesForm $form;

    #[Layout('layouts.publico')]
    public function render()
    {
        //Inicializacion de variables
        $subareasOptions = [];
        $areasOptions = Area::all();
        $tiposFiltro = [];

        if ($this->areaSeleccionada) {
            $subareasOptions = Subarea::where('area_id', '=', $this->areaSeleccionada)->get(); //Obtiene las subareas correspondientes a la area seleccionada
        }


        //Filtramos los tipos de lider de acuerdo a si es externo o interno
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

    public function selectSubareaOption($subarea)
    {


        if (isset ($subarea['area'])) {
            dd($subarea);
        }
        //  dd($subarea);
        // Convertir el array a un modelo para obtener area y grupo
        $subareaModel = Subarea::make($subarea);
        $subarea['grupo'] = $subareaModel->grupo->nombre;
        $subarea['area'] = $subareaModel->area->nombre;


        $subareaId = $subarea['id'];  // id de la subarea

        $existeId = null;

        foreach ($this->selectedSubareas as $key => $selectedSubarea) {
            if ($selectedSubarea['id'] == $subareaId) {
                $existeId = $key;  // Encontrar el índice si el id de la subárea ya está en el arreglo
                break; //si la encuentra detenemos
            }
        }

        if ($existeId !== null) {
            unset($this->selectedSubareas[$existeId]);  // Eliminar el elemento si ya existe
        } else {
            $this->selectedSubareas[] = $subarea;  // Agregar la subárea si no existe

        }
    }

    public function actualizarAreasSeleccionadas($areaId)
    {
        // dd($areaId);
        $this->areaSeleccionada = $areaId['id'];
    }
}
