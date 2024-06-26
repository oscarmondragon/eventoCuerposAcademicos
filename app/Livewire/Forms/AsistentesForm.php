<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class AsistentesForm extends Form
{
    use WithFileUploads;

    #[Validate('required')]
    public $nombre;

    #[Validate('required')]
    public $apellidoPaterno;

    #[Validate('')]
    public $apellidoMaterno;

    #[Validate('required')]
    public $email;

    #[Validate('required')]
    public $telefono;

    #[Validate('required')]
    public $lugarOrigen;

    #[Validate('required')]
    public $dependencia;

    #[Validate('required')]
    public $tipo;

    #[Validate('required_if:tipo,Otro')]
    public $otroTipo;

    #[Validate('required')]
    public $interes;

    #[Validate('required')]
    public $comentario;



    public function store()
    {
        $this->validate();
    }
}
