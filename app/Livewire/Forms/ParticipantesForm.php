<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Collection;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ParticipantesForm extends Form
{

    //GENERALES
    #[Validate('required')]
    public $tipoRegistro = '0';

    #[Validate('required')]
    public $nombreGrupo;

    #[Validate('required')]
    public $pais;

    #[Validate('required')]
    public $telefonoGeneral = '';

    #[Validate('required')]
    public $correoGeneral = '';

    #[Validate('required')]
    public $lugarProcedencia;

    #[Validate('required|array|min:1')]
    public $subareasSeleccionadas;

    #[Validate('required')]
    public $lineasInvestigacion;

    #[Validate('required')]
    public $productosLogrados = '';

    #[Validate('required')]
    public $casosExito = '';

    #[Validate('required')]
    public $propuestas = '';

    #[Validate('required')]
    public $fortalezas = '';

    #[Validate('required')]
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

    #[Validate('required')]
    public $descripcionBanner = '';

    #[Validate('required')]
    public $telefonoBanner = '';

    #[Validate('required')]
    public $correoBanner = '';

    public $redesBanner = [];

    public $facebook = '';

    public $x = '';

    public $youtube = '';

    //BOUCHER
    public $boucher = null;

    #[Validate('accepted')]
    public $aceptoDatos;


    public function store()
    {
        $this->validate();
        dd("Guardado");
        // Post::create($this->all());
    }

}
