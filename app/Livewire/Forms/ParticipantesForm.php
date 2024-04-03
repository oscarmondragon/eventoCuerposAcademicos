<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Collection;
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

    #[Validate('required')]
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
        'pais.different' => 'El país no puede estar vacío.',
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
        'integrantes.required' => 'Debes de agregar por lo menos un integrante.',




    ];


    public function store()
    {
        $this->validate();
        dd("Guardado");
        // Post::create($this->all());
    }

}
