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

    public $search = '';
    public $filtroProcedencia = 0;
    public $filtroEstatus = 0;


    public function render()
    {

        $registros = Registro::select();
        // $registros = Registro::with('archivos', 'integrantes', 'lineas', 'area.area', 'subareas.subarea', 'banner');

        if ($this->filtroProcedencia == 1) {
            $registros = $registros->where('tipo_solicitante', 'Interno');
        } else if ($this->filtroProcedencia == 2) {
            $registros = $registros->where('tipo_solicitante', 'Externo');

        }

        if ($this->filtroEstatus == 1) {
            $registros = $registros->where('aprobacion', null);

        } else if ($this->filtroEstatus == 2) {
            $registros = $registros->where('aprobacion', 1);

        } else if ($this->filtroEstatus == 3) {
            $registros = $registros->where('aprobacion', 0);

        }



        if (!empty($this->search)) {

            $registros->where('email', 'like', '%' . $this->search . '%')
                ->orWhere('espacio_procedencia', 'like', '%' . $this->search . '%')
                ->orWhere('cuerpo_grupo_red', 'like', '%' . $this->search . '%')
                ->orWhere('tipo_solicitante', 'like', '%' . $this->search . '%');
        }

        return view(
            'livewire.admin.registro-participantes-show',
            ['registros' => $registros->paginate(2, pageName: 'registros')]
        );

    }

    public function limpiarFiltros()
    {
        $this->filtroEstatus = 0;
        $this->filtroProcedencia = 0;
        $this->search = '';


    }
}
