<?php

namespace App\Livewire\Participantes;

use App\Livewire\Forms\ParticipantesForm;
use App\Models\Area;
use App\Models\CuerpoAcademico;
use App\Models\EspacioAcademico;
use App\Models\Integrantes;
use App\Models\Linea;
use App\Models\PaisCatalogo;
use App\Models\Subarea;
use App\Models\TipoLider;
use Livewire\WithFileUploads;
use Livewire\Component;
use Livewire\Attributes\Layout;

class RegistroParticipantes extends Component
{
    use WithFileUploads;

    public $selectedSubareas = [];
    public $tipoLiderSeleccionado;
    public $paises;
    public $espaciosAcademicos;
    public $cuerposAcademicos;
    public $tipoIntegrante = 'Integrante';

    public ParticipantesForm $form;

    public $listeners = [
        'addLinea',
        'addIntegrante',
        'save'
    ];

    #[Layout('layouts.publico')]


    public function mount()
    {
        $this->form->lineasInvestigacion = collect($this->form->lineasInvestigacion);
        $this->form->lideres = collect($this->form->lideres);
        $this->form->integrantes = collect($this->form->integrantes);

        $this->paises = PaisCatalogo::all();
        $this->espaciosAcademicos = EspacioAcademico::all();
        $this->cuerposAcademicos = CuerpoAcademico::all();
    }
    public function render()
    {
        //Inicializacion de variables
        $subareasOptions = [];
        $areasOptions = Area::all();
        // $tiposFiltro = [];

        if ($this->form->areaSeleccionada) {
            $subareasOptions = Subarea::where('area_id', '=', $this->form->areaSeleccionada)->get(); //Obtiene las subareas correspondientes a la area seleccionada
        }


        //Filtramos los tipos de lider de acuerdo a si es externo o interno
        /*    if ($this->form->tipoRegistro == '1') {
               $tiposFiltro = TipoLider::where('tipo_solicitante', 'Interno')->get();
           } elseif ($this->form->tipoRegistro == '2') {
               $tiposFiltro = TipoLider::where('tipo_solicitante', 'Externo')->get();
           } else {
               $tiposFiltro = [];
           }
    */
        return view('livewire.participantes.registro-participantes', ['subareasOptions' => $subareasOptions, 'areasOptions' => $areasOptions]);
    }
    public function save()
    {
        $this->form->store();
        $this->limpiarCampos();

        //  return $this->redirect('/registro-participantes');
    }

    public function selectSubareaOption($subarea)
    {
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
            unset($this->form->subareasSeleccionadas[$existeId]); //Eliminamos de la coleccion del form

        } else {
            $this->selectedSubareas[] = $subarea;  // Agregar la subárea si no existe
            $this->form->subareasSeleccionadas[] = $subarea;
        }

        $this->validateOnly('form.subareasSeleccionadas');
    }

    public function limpiarSubareas()
    {

        //Borramos datos de subareas
        $this->selectedSubareas = [];
        $this->form->subareasSeleccionadas = [];

        //Aprovechamos para actualizar la area seleccionada en el banner
        if ($this->form->areaSeleccionada != 0) {
            $nombreArea = Area::find($this->form->areaSeleccionada); //Buscamos para obtener el nombre
            //Actualizamos area en el banner
            $this->form->areaSeleccionadaBanner = $nombreArea->nombre;
        }
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

    public function addIntegrante(
        $_id,
        $nombre,
        $apellidoPaterno,
        $apellidoMaterno,
        $tipoLider,
        $gradoAcademico,
        $gradoAcademicoAbrev,
        $sexo,
        $genero,
        $correo,
        $telefono,
        $isLider,
        $tipoIntegrante
    ) {
        $this->form->lideres = collect($this->form->lideres);
        $this->form->integrantes = collect($this->form->integrantes);

        if ($_id == 0) { //entramos aqui si el item es nuevo
            if ($isLider == 1) { //lo guardamos en lider
                // Genera un nuevo ID para el elemento
                $newItemId = $this->form->lideres->max('_id') + 1;

                //Agregamos la linea al arreglo
                $this->form->lideres->push([
                    '_id' => $newItemId,
                    'nombre' => $nombre,
                    'apellidoPaterno' => $apellidoPaterno,
                    'apellidoMaterno' => $apellidoMaterno,
                    'tipoLider' => $tipoLider,
                    'gradoAcademico' => $gradoAcademico,
                    'gradoAcademicoAbrev' => $gradoAcademicoAbrev,
                    'sexo' => $sexo,
                    'genero' => $genero,
                    'correo' => $correo,
                    'telefono' => $telefono,
                    'tipoIntegrante' => $tipoIntegrante
                ]);
            } else {
                // Genera un nuevo ID para el integrante
                $newItemId = $this->form->integrantes->max('_id') + 1;

                //Agregamos la linea al arreglo
                $this->form->integrantes->push([
                    '_id' => $newItemId,
                    'nombre' => $nombre,
                    'apellidoPaterno' => $apellidoPaterno,
                    'apellidoMaterno' => $apellidoMaterno,
                    'tipoLider' => $tipoLider,
                    'gradoAcademico' => $gradoAcademico,
                    'gradoAcademicoAbrev' => $gradoAcademicoAbrev,
                    'sexo' => $sexo,
                    'genero' => $genero,
                    'correo' => $correo,
                    'telefono' => $telefono,
                    'tipoIntegrante' => $tipoIntegrante,
                ]);
            }
        } else {
            //Entra aqui para editar el existente

            if ($isLider == 1) {
                //Si entra aqui es por que entro a la funcion editar, entonces buscamos el item en la collecion por su id
                $lider = $this->form->lideres->firstWhere('_id', $_id);

                if ($lider) {
                    //actualizamos el item si existe en la busqueda
                    $lider['nombre'] = $nombre;
                    $lider['apellidoPaterno'] = $apellidoPaterno;
                    $lider['apellidoMaterno'] = $apellidoMaterno;
                    $lider['tipoLider'] = $tipoLider;
                    $lider['gradoAcademico'] = $gradoAcademico;
                    $lider['gradoAcademicoAbrev'] = $gradoAcademicoAbrev;
                    $lider['sexo'] = $sexo;
                    $lider['genero'] = $genero;
                    $lider['correo'] = $correo;
                    $lider['telefono'] = $telefono;

                    //Devolvemos la nueva collecion
                    $this->form->lideres = $this->form->lideres->map(function ($lider) use ($_id, $nombre, $apellidoPaterno, $apellidoMaterno, $tipoLider, $gradoAcademico, $gradoAcademicoAbrev, $sexo, $genero, $correo, $telefono) {
                        if ($lider['_id'] == $_id) {
                            $lider['nombre'] = $nombre;
                            $lider['apellidoPaterno'] = $apellidoPaterno;
                            $lider['apellidoMaterno'] = $apellidoMaterno;
                            $lider['tipoLider'] = $tipoLider;
                            $lider['gradoAcademico'] = $gradoAcademico;
                            $lider['gradoAcademicoAbrev'] = $gradoAcademicoAbrev;
                            $lider['sexo'] = $sexo;
                            $lider['genero'] = $genero;
                            $lider['correo'] = $correo;
                            $lider['telefono'] = $telefono;
                        }
                        return $lider;
                    });
                    //actualizamos indices
                    $this->form->lideres = $this->form->lideres->values();
                }
            } else {
                //Si entra aqui es por que entro a la funcion editar, entonces buscamos el item en la collecion por su id
                $integrante = $this->form->integrantes->firstWhere('_id', $_id);

                if ($integrante) {
                    //actualizamos el item si existe en la busqueda
                    $integrante['nombre'] = $nombre;
                    $integrante['apellidoPaterno'] = $apellidoPaterno;
                    $integrante['apellidoMaterno'] = $apellidoMaterno;
                    $integrante['tipoLider'] = $tipoLider;
                    $integrante['gradoAcademico'] = $gradoAcademico;
                    $integrante['gradoAcademicoAbrev'] = $gradoAcademicoAbrev;
                    $integrante['sexo'] = $sexo;
                    $integrante['genero'] = $genero;
                    $integrante['correo'] = $correo;
                    $integrante['telefono'] = $telefono;
                    $integrante['tipoIntegrante'] = $tipoIntegrante;


                    //Devolvemos la nueva collecion
                    $this->form->integrantes = $this->form->integrantes->map(function ($integrante) use ($_id, $nombre, $apellidoPaterno, $apellidoMaterno, $tipoLider, $gradoAcademico, $gradoAcademicoAbrev, $sexo, $genero, $correo, $telefono, $tipoIntegrante) {
                        if ($integrante['_id'] == $_id) {
                            $integrante['nombre'] = $nombre;
                            $integrante['apellidoPaterno'] = $apellidoPaterno;
                            $integrante['apellidoMaterno'] = $apellidoMaterno;
                            $integrante['tipoLider'] = $tipoLider;
                            $integrante['gradoAcademico'] = $gradoAcademico;
                            $integrante['gradoAcademicoAbrev'] = $gradoAcademicoAbrev;
                            $integrante['sexo'] = $sexo;
                            $integrante['genero'] = $genero;
                            $integrante['correo'] = $correo;
                            $integrante['telefono'] = $telefono;
                            $integrante['tipoIntegrante'] = $tipoIntegrante;
                        }
                        return $integrante;
                    });
                    //actualizamos indices
                    $this->form->integrantes = $this->form->integrantes->values();
                }
            }
        }
    }

    public function deleteLinea($linea)
    {

        //La linea SE ESTA ELIMINANDO CON ALPINEJS desde el front

        //Comprobamos si el bien ya esta en bd para eliminarlo y actualizar datos   
        if (isset($linea['id'])) {
            $lineaBd = Linea::findOrFail($linea['id']);
            if ($lineaBd) { // si lo encuentra lo eliminamos

                //Eliminamos el bien
                $lineaBd->delete();
            }
        }

        $this->form->lineasInvestigacion = collect($this->form->lineasInvestigacion); //CONVERTIMOS NUEVAMENTE BIENES EN COLLECTION
    }


    public function updateTelefonoBanner()
    {
        $this->form->telefonoBanner = $this->form->telefonoGeneral;
    }

    public function updateCorreoBanner()
    {
        $this->form->correoBanner = $this->form->correoGeneral;
    }

    public function updateCuerpoAcadBanner()
    {
        $this->form->nombreGrupoBanner = $this->form->nombreGrupo;
    }

    public function cuerpoAcademicoId($id)
    {
        $this->form->idCuerpoAcademico = $id;
        $this->form->lineasInvestigacion = [];
        $this->form->nombreGrupoBanner = $this->form->nombreGrupo;
    }


    public function updateLugarProcedenciaBanner()
    {
        $this->form->lugarProcedenciaBanner = $this->form->lugarProcedencia;
    }

    public function deleteIntegrante($integrante)
    {

        //EL INTEGRANTE SE ESTA ELIMINANDO CON ALPINEJS desde el front

        //Comprobamos si el bien ya esta en bd para eliminarlo y actualizar datos   
        if (isset($integrante['id'])) {
            $integranteBd = Integrantes::findOrFail($integrante['id']);
            if ($integranteBd) { // si lo encuentra lo eliminamos

                //Eliminamos el bien
                $integranteBd->delete();
            }
        }

        $this->form->integrantes = collect($this->form->integrantes); //CONVERTIMOS NUEVAMENTE BIENES EN COLLECTION
    }

    public function espacioAcademicoId($id)
    {
        $this->cuerposAcademicos = CuerpoAcademico::where('espacio_academico_id', $id)->get();
    }


    public function limpiarCamposProcedencia()
    {
        $this->form->lugarProcedencia = null;
        $this->form->nombreGrupo = null;
        $this->form->lineasInvestigacion = [];
        $this->form->lideres = [];
    }

    // public function limpiarLineas()
    // {
    //     $this->form->lineasInvestigacion = '';
    // }

    public function limpiarCampos()
    {
        $this->form->tipoRegistro = 0;
        $this->form->lugarProcedencia = '';
        $this->form->nombreGrupo = '';
        $this->form->pais = '';
        $this->form->telefonoGeneral = '';
        $this->form->correoGeneral = '';
        $this->form->correoGeneralConfirmacion = '';
        $this->selectedSubareas = [];
        $this->form->subareasSeleccionadas = [];
        $this->form->lineasInvestigacion = [];
        $this->form->productosLogrados = '';
        $this->form->casosExito = '';
        $this->form->propuestas = '';
        $this->form->fortalezas = '';
        $this->form->necesidades = '';
        $this->form->lideres = [];
        $this->form->integrantes = [];
        $this->form->nombreGrupoBanner = '';
        $this->form->lugarProcedenciaBanner = '';
        $this->form->descripcionBanner = '';
        $this->form->telefonoBanner = '';
        $this->form->correoBanner = '';
        $this->form->areaSeleccionadaBanner = '';
        $this->form->facebook = '';
        $this->form->x = '';
        $this->form->youtube = '';
        $this->form->otraRed = '';
        $this->form->boucher = null;
        $this->form->aceptoDatos = false;
    }
}
