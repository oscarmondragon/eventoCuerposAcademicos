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
    public $lugarProcedencia;

    #[Validate('required')]
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
    #[Validate('required')]
    public $integrantes = '';

    //BANNER
    #[Validate('required')]
    public $nombreGrupoBannes;

    #[Validate('required')]
    public $integrantesBanner = '';

    #[Validate('required')]
    public $descripcionBanner = '';

    #[Validate('required')]
    public $telefonoBanner = '';

    #[Validate('required')]
    public $correoBanner = '';
    public $redesBanner = [];

    //BOUCHER
    public $boucher;



    public function store()
    {
        $this->validate();
        dd("Paso");
        // Post::create($this->all());
    }

}
