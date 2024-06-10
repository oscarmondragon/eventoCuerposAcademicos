<?php

namespace App\Livewire\Modals;

use LivewireUI\Modal\ModalComponent;

class ObservacionesModal extends ModalComponent
{

    public $id;
    public $observaciones;

    public function render()
    {
        return view('livewire.modals.observaciones-modal');
    }
}
