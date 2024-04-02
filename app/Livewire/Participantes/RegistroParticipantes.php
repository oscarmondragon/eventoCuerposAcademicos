<?php

namespace App\Livewire\Participantes;

use App\Livewire\Forms\ParticipantesForm;
use App\Models\Area;
use App\Models\Linea;
use App\Models\Subarea;
use App\Models\TipoLider;
use Livewire\Component;
use Livewire\Attributes\Layout;

class RegistroParticipantes extends Component
{

    public $selectedSubareas = [];
    public $areaSeleccionada;
    public ParticipantesForm $form;

    public $listeners = [
        'addLinea'
    ];

    #[Layout('layouts.publico')]

    public function mount(){
        $this->form->lineasInvestigacion = collect($this->form->lineasInvestigacion);
    }


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

    public function addLinea($_id, $nombre, $descripcion)
    {
        $this->form->lineasInvestigacion = collect($this->form->lineasInvestigacion);

        if ($_id == 0) { //entramos aqui si el item es nuevo
            // Genera un nuevo ID para el elemento
            $newItemId = $this->form->lineasInvestigacion->max('_id') + 1;

            //Agregamos la linea al arreglo
            $this->form->lineasInvestigacion->push([
                '_id' => $newItemId,
                'nombre' => $nombre,
                'descripcion' => $descripcion,
            ]);

        } else {
            //Entra aqui para editar el existente
            //Si entra aqui es por que entro a la funcion editar, entonces buscamos el item en la collecion por su id
            $linea = $this->form->lineasInvestigacion->firstWhere('_id', $_id);

            if ($linea) {
                //actualizamos el item si existe en la busqueda
                $linea['nombre'] = $nombre;
                $linea['descripcion'] = $descripcion;

                //Devolvemos la nueva collecion
                $this->form->lineasInvestigacion = $this->form->lineasInvestigacion->map(function ($linea) use ($_id, $nombre, $descripcion) {
                    if ($linea['_id'] == $_id) {
                        $linea['nombre'] = $nombre;
                        $linea['descripcion'] = $descripcion;
                    }
                    return $linea;
                });
                //actualizamos indices
                $this->form->lineasInvestigacion = $this->form->lineasInvestigacion->values();
            }

        }

        $this->form->descripcionBanner = $this->form->lineasInvestigacion->first()['descripcion'];
    }

    public function deleteLinea($linea)
    {

        //La linea SE ESTA ELIMINANDO CON ALPINEJS desde el front

        //Comprobamos si el bien ya esta en bd para eliminarlo y actualizar datos   
        if (isset ($linea['id'])) {
            $lineaBd = Linea::findOrFail($linea['id']);
            if ($lineaBd) { // si lo encuentra lo eliminamos

                //Eliminamos el bien
                $lineaBd->delete();
            }
        }

        $this->form->lineasInvestigacion = collect($this->form->lineasInvestigacion); //CONVERTIMOS NUEVAMENTE BIENES EN COLLECTION
    }

    public function updateTelefonoBanner(){
        $this->form->telefonoBanner = $this->form->telefonoGeneral;
    }

    public function updateCorreoBanner(){
        $this->form->correoBanner = $this->form->correoGeneral;
    }

    public function updateCuerpoAcadBanner(){
        $this->form->nombreGrupoBanner = $this->form->nombreGrupo;
    }
}
