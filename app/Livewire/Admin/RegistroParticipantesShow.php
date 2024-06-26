<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Session;
use App\Models\Area;
use App\Models\Registro;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

#[Layout('layouts.app')]

class RegistroParticipantesShow extends Component
{
    use WithPagination;

    #[Session]
    public $search = '';

    #[Session]
    public $filtroProcedencia = 0;

    #[Session]
    public $filtroEstatus = 0;
    #[Session]
    public $selectedArea;
    public $optionsAreas;

    public $sortColumna = 'updated_at';
    public $sortDireccion = 'DESC';

    #[Session]
    public $paginador = 10;


    public function render()
    {

        //$registros = Registro::select();
        $registros = Registro::with('area');
        $this->optionsAreas = Area::all();

        //dd($optionAreas);

        if ($this->filtroProcedencia == 1) {
            $registros = $registros->where('tipo_solicitante', 'Interno');
        } else if ($this->filtroProcedencia == 2) {
            $registros = $registros->where('tipo_solicitante', 'Externo');
        } else if ($this->filtroProcedencia == 3) {
            $registros = $registros->where('tipo_solicitante', 'Red');
        }

        if ($this->filtroEstatus == 1) {
            $registros = $registros->where('aprobacion', null);
        } else if ($this->filtroEstatus == 2) {
            $registros = $registros->where('aprobacion', 1);
        } else if ($this->filtroEstatus == 3) {
            $registros = $registros->where('aprobacion', 0);
        } elseif ($this->filtroEstatus == 4) {
            $registros = $registros->where('aprobacion', 1)->where('checkFactura', 1);
        }

        if ($this->selectedArea != 0) {
            $registros = $registros->whereHas('area', function (Builder $query) {
                $query->where('area_id', $this->selectedArea);
            });
        }



        if (!empty($this->search)) {

            $registros = $registros->where('email', 'like', '%' . $this->search . '%')
                ->orWhere('espacio_procedencia', 'like', '%' . $this->search . '%')
                ->orWhere('cuerpo_grupo_red', 'like', '%' . $this->search . '%')
                ->orWhere('tipo_solicitante', 'like', '%' . $this->search . '%');
        }

        return view(
            'livewire.admin.registro-participantes-show',
            ['registros' => $registros->orderBy($this->sortColumna, $this->sortDireccion)->paginate($this->paginador, pageName: 'registros')]
        );
    }

    public function sort($columna)
    {
        $this->sortColumna = $columna;
        $this->sortDireccion = $this->sortDireccion == 'ASC' ? 'DESC' : 'ASC';
    }

    public function limpiarFiltros()
    {
        $this->filtroEstatus = 0;
        $this->filtroProcedencia = 0;
        $this->search = '';
        $this->selectedArea = 0;
        //  $this->paginador = 10;
    }

    public function updatedSearch()
    {
        $this->resetPage(pageName: 'registros');
    }
    public function updatedFiltroProcedencia()
    {
        $this->resetPage(pageName: 'registros');
    }
    public function updatedFiltroEstatus()
    {
        $this->resetPage(pageName: 'registros');
    }
    public function updatedselectedArea()
    {
        $this->resetPage(pageName: 'registros');
    }


    public function updatedPaginador()
    {
        $this->resetPage(pageName: 'registros');
    }


}
