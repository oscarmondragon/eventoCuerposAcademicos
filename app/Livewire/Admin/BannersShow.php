<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Session;
use App\Models\Banner;
use App\Models\Registro;
use App\Models\Area;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Exports\BannersExport;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.app')]

class BannersShow extends Component
{

    use WithPagination;

    #[Session]
    public $search = '';
    public $filtroProcedencia = 0;
    #[Session]
    public $filtroArea = 0;
    #[Session]
    public $optionsArea;

    public $columna = 'updated_at';
    public $direccion = 'DESC';

    public $paginador = 5;

    public $bannersDownload;

    public function mount()
    {
        $this->optionsArea = Area::all();
    }
    public function render()
    {
        $banners = Banner::with('registro')->whereHas('registro', function ($query) {
            $query->where('aprobacion', 1)->where('adjuntoPago', 1);
        });

        if ($this->filtroProcedencia == 1) {
            $banners = $banners->whereHas('registro', function ($query) {
                $query->where('tipo_solicitante', 'Interno');
            });
        } else if ($this->filtroProcedencia == 2) {
            $banners = $banners->whereHas('registro', function ($query) {
                $query->where('tipo_solicitante', 'Externo');
            });
        } else if ($this->filtroProcedencia == 3) {
            $banners = $banners->whereHas('registro', function ($query) {
                $query->where('tipo_solicitante', 'Red');
            });
        }


        if ($this->filtroArea != 0) {
            $banners = $banners->whereHas('registro', function ($query) {
                $query->whereHas('area', function ($query) {
                    $query->where('area_id', $this->filtroArea);
                });
            });
        }


        if (!empty($this->search)) {

            $banners->where('email', 'like', '%' . $this->search . '%')
                ->orWhere('espacio_procedencia', 'like', '%' . $this->search . '%')
                ->orWhere('cuerpo_grupo_red', 'like', '%' . $this->search . '%');
        }

        //Obtenemos solo los datos necesarios para la colleciion de export
        $this->bannersDownload = collect($banners->get())->map(function ($banner) {
            $objetoIntegrantes = json_decode($banner->integrantes);
            $coleccionIntegrantes = collect($objetoIntegrantes);

            $lider = '';
            $integrantes = collect();
            $colaboradores = collect();
            foreach ($coleccionIntegrantes as $item) {
                //Dividimos los integrantes para poder mandarlos al excel de banners separados
                if ($item->tipo == 'Lider') {
                    $lider = $item->gradoAcademicoAbrev . ' ' . $item->nombre . ' ' . $item->apellidoPaterno . ' ' . $item->apellidoMaterno;
                } else
                    if ($item->tipo == 'Integrante') {
                        $integrantes->push($item->gradoAcademicoAbrev . ' ' . $item->nombre . ' ' . $item->apellidoPaterno . ' ' . $item->apellidoMaterno);
                    } else
                        if ($item->tipo == 'Colaborador') {
                            $colaboradores->push($item->gradoAcademicoAbrev . ' ' . $item->nombre . ' ' . $item->apellidoPaterno . ' ' . $item->apellidoMaterno);
                        }
            }
            return [ //se colocan todos los datos que llevara el excel de banners
                'espacio_procedencia' => $banner->espacio_procedencia,
                'cuerpo_grupo_red' => $banner->cuerpo_grupo_red,
                'area_tematica' => $banner->area_tematica,
                'descripcion_linea' => $banner->descripcion_linea,
                'lider' => $lider,
                'integrantes' => $integrantes->join(", "),
                'colaboradores' => $colaboradores->join(", "),
                'telefono' => $banner->telefono,
                'email' => $banner->email,
                'twitter' => $banner->twitter,
                'facebook' => $banner->facebook,
                'youtube' => $banner->youtube,
                'otra_red' => $banner->otra_red,
            ];
        });


        return view(
            'livewire.admin.banners-show',
            ['banners' => $banners->orderBy($this->columna, $this->direccion)->paginate($this->paginador, pageName: 'banners')]
        );
    }

    public function sort($columna)
    {
        $this->columna = $columna;
        $this->direccion = $this->direccion == 'ASC' ? 'DESC' : 'ASC';
    }

    public function limpiarFiltros()
    {
        $this->filtroProcedencia = 0;
        $this->filtroArea = 0;
        $this->search = '';
    }
    public function export()
    {
        return Excel::download(new BannersExport($this->bannersDownload), 'banners.xlsx');
    }
}
