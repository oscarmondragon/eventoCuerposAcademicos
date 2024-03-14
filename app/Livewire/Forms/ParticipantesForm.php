<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ParticipantesForm extends Form
{
    #[Validate('required')]
    public $tipo_registro = '0';


    public function store()
    {
        $this->validate();
        dd("Paso");
        // Post::create($this->all());
    }

}
