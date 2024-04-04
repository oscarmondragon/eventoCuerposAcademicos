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

    #[Validate('required|max:100')]
    public $nombreGrupo;

    #[Validate('required|max:50')]
    public $pais = "México";

    #[Validate('required|max:15|regex:/^[0-9()+]*$/u')]
    public $telefonoGeneral = '';

    #[Validate('required|email|unique:registros,email|max:100')]
    public $correoGeneral = '';

    #[Validate('required|max:80')]
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
    #[Validate('required|max:100')]
    public $nombreGrupoBanner = '';

    #[Validate('required')]
    public $integrantesBanner = '';

    #[Validate('required|max:500')]
    public $descripcionBanner = '';

    #[Validate('required|max:15|regex:/^[0-9()+]*$/u')]
    public $telefonoBanner = '';

    #[Validate('required|email|unique:banners,email|max:100')]
    public $correoBanner = '';

    public $redesBanner = [];

    #[Validate('nullable|max:5')]
    public $facebook = '';

    #[Validate('nullable|max:5')]
    public $x = '';

    #[Validate('nullable|max:5')]
    public $youtube = '';

    //BOUCHER
    public $boucher = null;

    #[Validate('accepted')]
    public $aceptoDatos;


    protected $messages = [
        'tipoRegistro.required' => 'La procedencia no puede estar vacía.',
        'tipoRegistro.gt' => 'La procedencia no puede estar vacía.',
        'nombreGrupo.required' => 'El nombre del Cuerpo Académico, red o grupo de investigación no puede estar vacío.',
        'nombreGrupo.max' => 'El nombre del Cuerpo Académico es demasiado largo.',
        'lugarProcedencia.required' => 'El nombre de la universidad, dependencia o departamento de adscripción no puede estar vacío.',
        'pais.required' => 'El país no puede estar vacío.',
        // 'pais.gt' => 'El país no puede estar vacío.',
        'pais.max' => 'El país es demasiado largo.',
        'telefonoGeneral.required' => 'El teléfono de contacto no puede estar vacío.',
        'telefonoGeneral.max' => 'El teléfono de contacto es demasiado largo.',
        'telefonoGeneral.regex' => 'El formato del teléfono no es valido.',
        'correoGeneral.required' => 'El correo electrónico no puede estar vacío.',
        'correoGeneral.email' => 'Debe ser un coreo electrónico valido.',
        'correoGeneral.unique' => 'El correo electrónico ya existe.',
        'correoGeneral.max' => 'El correo electrónico es demasiado largo.',

        'subareasSeleccionadas.required' => 'Debes de seleccionar por lo menos una area temática y una subarea.',
        'subareasSeleccionadas.array' => 'Debes de seleccionar por lo menos una area temática y una subarea.',
        'subareasSeleccionadas.min' => 'Debes de seleccionar por lo menos una area temática y una subarea.',
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

        'lideres.required' => 'Debes de agregar un líder.',
        'lideres.min' => 'Debe ser por lo menos un líder.',
        'lideres.max' => 'Solo puede haber un líder.',
        'integrantes.required' => 'Debes de agregar por lo menos un integrante.',
        'integrantes.min' => 'Debes de agregar por lo menos un integrante.',
        
        'nombreGrupoBanner.required' => 'El nombre del Cuerpo Académico, red o grupo de investigación no puede estar vacío.',
        'nombreGrupoBanner.max' => 'El nombre del Cuerpo Académico es demasiado largo.',
        
        'descripcionBanner.required' => 'La descripción de su principal línea de generación no puede estar vacía.',
        'descripcionBanner.max' => 'La descripción de su principal línea de generación es demasiado larga.',
        
        'telefonoBanner.required' => 'El teléfono de contacto no puede estar vacío.',
        'telefonoBanner.max' => 'El teléfono de contacto es demasiado largo.',
        'telefonoBanner.regex' => 'El formato del teléfono no es valido.',

        'correoBanner.required' => 'El correo electrónico no puede estar vacío.',
        'correoBanner.email' => 'Debe ser un coreo electrónico valido.',
        'correoBanner.unique' => 'El correo electrónico ya existe.',
        'correoBanner.max' => 'El correo electrónico es demasiado largo.',

        'facebook.max' => 'Nombre de Facebook demasiado largo.',
        'x.max' => 'Nombre de X demasiado largo.',
        'youtube.max' => 'Nombre de YouTube demasiado largo.',
    ];


    public function store()
    {
        $this->validate();
        dd("Guardado");
        // Post::create($this->all());
    }

}
