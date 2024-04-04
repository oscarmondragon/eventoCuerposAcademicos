<?php

namespace App\Livewire\Forms;

use App\Models\Banner;
use App\Models\FortalezaNecesidad;
use App\Models\Integrantes;
use App\Models\Linea;
use App\Models\Registro;
use Illuminate\Support\Facades\DB;
use App\Models\SubareaToRegistro;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ParticipantesForm extends Form
{

    //GENERALES
    #[Validate('required|gt:0')]
    public $tipoRegistro = '0';

    #[Validate('required')]
    public $nombreGrupo;

    #[Validate('required')]
    public $pais;

    #[Validate('required')]
    public $telefonoGeneral = '';

    #[Validate('required|email')]
    public $correoGeneral = '';

    #[Validate('required')]
    public $lugarProcedencia;

    #[Validate('required|array|min:1')]
    public $subareasSeleccionadas = [];

    #[Validate('required|array|min:1')]
    public $lineasInvestigacion;

    #[Validate('required|max:500')]
    public $productosLogrados = '';

    #[Validate('required|max:500')]
    public $casosExito = '';

    #[Validate('required|max:500')]
    public $propuestas = '';

    #[Validate('required|max:500')]
    public $fortalezas = '';

    #[Validate('required|max:500')]
    public $necesidades = '';

    //INTEGRANTES
    //lider
    #[Validate('required|array|min:1|max:1')]
    public $lideres;

    #[Validate('required|array|min:1')]
    public $integrantes;

    //BANNER
    #[Validate('required')]
    public $nombreGrupoBanner = '';

    public $integrantesBanner = '';

    #[Validate('required|max:500')]
    public $descripcionBanner = '';

    #[Validate('required')]
    public $telefonoBanner = '';

    #[Validate('required|email')]
    public $correoBanner = '';

    public $redesBanner = [];

    public $facebook = '';

    public $x = '';

    public $youtube = '';

    //BOUCHER
    public $boucher = null;

    #[Validate('accepted')]
    public $aceptoDatos;


    protected $messages = [
        'tipoRegistro.required' => 'La procedencia no puede estar vacía.',
        'tipoRegistro.gt' => 'La procedencia no puede estar vacía.',
        'nombreGrupo.required' => 'El nombre del Cuerpo Académico, red o grupo de investigación no puede estar vacío.',
        'lugarProcedencia.required' => 'El nombre de la universidad, dependencia o departamento de adscripción no puede estar vacío.',
        'pais.required' => 'El país no puede estar vacío.',
        'telefonoGeneral.required' => 'El teléfono no puede estar vacío.',
        'correoGeneral.required' => 'El correo electrónico no puede estar vacío.',
        'correoGeneral.email' => 'Debe ser un coreo electrónico valido.',
        'subareasSeleccionadas.required' => 'Debes de seleccionar por lo menos una area tematica y una subarea.',
        'subareasSeleccionadas.array' => 'Debes de seleccionar por lo menos una area tematica y una subarea.',
        'subareasSeleccionadas.min' => 'Debes de seleccionar por lo menos una area tematica y una subarea.',
        'lineasInvestigacion.required' => 'Debes agregar por lo menos una linea de generacion y aplicacion del conocimiento.',
        'lineasInvestigacion.array' => 'Debes agregar por lo menos una linea de generacion y aplicacion del conocimiento.',
        'lineasInvestigacion.min' => 'Debes agregar por lo menos una linea de generacion y aplicacion del conocimiento.',
        'productosLogrados.required' => 'Este campo no puede estar vacio.',
        'productosLogrados.max' => 'Este campo solo admite máximo 500 caracteres.',
        'casosExito.required' => 'Este campo no puede estar vacio.',
        'casosExito.max' => 'Este campo solo admite máximo 500 caracteres.',
        'propuestas.required' => 'Este campo no puede estar vacio.',
        'propuestas.max' => 'Este campo solo admite máximo 500 caracteres.',
        'fortalezas.required' => 'Este campo no puede estar vacio.',
        'fortalezas.max' => 'Este campo solo admite máximo 500 caracteres.',
        'necesidades.required' => 'Este campo no puede estar vacio.',
        'necesidades.max' => 'Este campo solo admite máximo 500 caracteres.',
        'aceptoDatos.accepted' => 'Debes de aceptar el aviso de privacidad.',
        'lideres.required' => 'Debes de agregar un lider.',
        'lideres.min' => 'Debes de agregar un lider.',
        'lideres.max' => 'Solo se puede agregar un lider.',
        'lideres.array' => 'Solo se puede agregar un lider.',


        'integrantes.required' => 'Debes de agregar por lo menos un integrante.',
        'integrantes.min' => 'Debes de agregar por lo menos un integrante.',
        'integrantes.array' => 'Debes de agregar por lo menos un integrante.',

    ];


    public function store()
    {
        // $this->validate();

        DB::beginTransaction();
        try {
            $registro = new Registro;

            if ($this->tipoRegistro == 1) {
                $this->tipoRegistro = "Interno";
            } else if ($this->tipoRegistro == 2) {
                $this->tipoRegistro = "Externo";
            } else {
                return "Procedencia invalida.";
            }

            //Guardamos los datos del registro
            $registro->tipo_solicitante = $this->tipoRegistro;
            $registro->cuerpo_grupo_red = $this->nombreGrupo;
            $registro->productos_logrados = $this->productosLogrados;
            $registro->casos_exito = $this->casosExito;
            $registro->servicios_proyectos = $this->propuestas;
            $registro->pais = $this->pais;
            $registro->espacio_procedencia = $this->lugarProcedencia;
            $registro->espacio_procedencia = $this->lugarProcedencia;
            $registro->email = $this->correoGeneral;
            $registro->telefono = $this->telefonoGeneral;
            $registro->aceptoDatos = $this->aceptoDatos;
            $registro->save();

            //Guardamos fortalezas y necesidades
            $fortalezaDB = new FortalezaNecesidad; //Creamos una instancia de linea
            $fortalezaDB->registro_id = $registro->id;
            $fortalezaDB->descripcion = $this->fortalezas;
            $fortalezaDB->tipo = 'Fortaleza';
            $fortalezaDB->save();

            $necesidadDB = new FortalezaNecesidad; //Creamos una instancia de linea
            $necesidadDB->registro_id = $registro->id;
            $necesidadDB->descripcion = $this->necesidades;
            $necesidadDB->tipo = 'Necesidad';
            $necesidadDB->save();

            //Guaradamos lider e integrantes
            foreach ($this->lideres as $lider) {
                $liderIntegrante = new Integrantes; //Creamos una instancia de integrante

                $liderIntegrante->registro_id = $registro->id;
                $liderIntegrante->nombre = $lider['nombre'];
                $liderIntegrante->apellido_paterno = $lider['apellidoPaterno'];
                $liderIntegrante->apellido_materno = $lider['apellidoMaterno'];
                $liderIntegrante->grado_academico = $lider['gradoAcademico'];
                $liderIntegrante->grado_academico_abreviado = $lider['gradoAcademicoAbrev'];
                $liderIntegrante->sexo = $lider['sexo'];
                $liderIntegrante->genero = $lider['genero'];
                $liderIntegrante->email = $lider['correo'];
                $liderIntegrante->telefono = $lider['telefono'];
                $liderIntegrante->tipo = 'Lider';
                $liderIntegrante->tipo_lider = $lider['tipoLider'];

                $liderIntegrante->save();
            }


            foreach ($this->integrantes as $integrante) {

                $integranteDB = new Integrantes; //Creamos una instancia de integrante

                $integranteDB->registro_id = $registro->id;
                $integranteDB->nombre = $integrante['nombre'];
                $integranteDB->apellido_paterno = $integrante['apellidoPaterno'];
                $integranteDB->apellido_materno = $integrante['apellidoMaterno'];
                $integranteDB->grado_academico = $integrante['gradoAcademico'];
                $integranteDB->grado_academico_abreviado = $integrante['gradoAcademicoAbrev'];
                $integranteDB->sexo = $integrante['sexo'];
                $integranteDB->genero = $integrante['genero'];
                $integranteDB->email = $integrante['correo'];
                $integranteDB->telefono = $integrante['telefono'];
                $integranteDB->tipo = 'Integrante';
                $integranteDB->tipo_lider = null;

                $integranteDB->save();
            }

            //Guardamos lineas de generacion
            foreach ($this->lineasInvestigacion as $linea) {

                $lineaDB = new Linea; //Creamos una instancia de linea
                $lineaDB->registro_id = $registro->id;
                $lineaDB->nombre = $linea['nombre'];
                $lineaDB->descripcion = $linea['descripcion'];

                $lineaDB->save();
            }

            //Guardamos datos del banner

            $IntegrantesCompleto = $this->integrantes->merge($this->lideres); //combinamos las colecciones de integrantes y lider

            $integrantesFiltrado = $IntegrantesCompleto->map(function ($item) { //creamos una coleccion con menos campos para guardarlos en la tabla banner
                return [
                    '_id' => $item['_id'],
                    'nombre' => $item['nombre'],
                    'apellidoPaterno' => $item['apellidoPaterno'],
                    'apellidoMaterno' => $item['apellidoMaterno'],
                    'tipoLider' => $item['tipoLider']
                ];
            });

            $bannerDB = new Banner; //Creamos una instancia del modelo Banner

            $bannerDB->registro_id = $registro->id;
            $bannerDB->cuerpo_grupo_red = $this->nombreGrupoBanner;
            $bannerDB->integrantes = json_encode($integrantesFiltrado); // convertimos los integrantes en JSON
            $bannerDB->descripcion_linea = $this->descripcionBanner;
            $bannerDB->email = $this->correoBanner;
            $bannerDB->telefono = $this->telefonoBanner;
            $bannerDB->facebook = $this->facebook;
            $bannerDB->youtube = $this->youtube;
            $bannerDB->twitter = $this->x;

            $bannerDB->save();

            //Guardamos las subareastoregistros

            foreach ($this->subareasSeleccionadas as $subarea) {

                $subareasToRegistroDB = new SubareaToRegistro; //Creamos una instancia del modelo SubareaToRegistro

                $subareasToRegistroDB->registro_id = $registro->id;
                $subareasToRegistroDB->subarea_id = $subarea['id'];

                $subareasToRegistroDB->save();
            }

            DB::commit();
            return redirect('/registro-creado')->with('success', 'Su registro  ha sido guardado correctamente con el correo ' . $this->correoGeneral);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al guardar el registro. Por favor, intente más tarde. Si el problema persiste contacte al administrador del sistema.' . $e->getMessage());
        }
    }
}
