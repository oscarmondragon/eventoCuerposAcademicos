<?php

namespace App\Livewire\Modals;

use App\Livewire\Participantes\RegistroParticipantes;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class LineasModal extends ModalComponent
{
    public $_id = 0;

    #[Validate('required')]
    public $nombre = '';

    #[Validate('required')]
    public $descripcion = '';

    public $listeners = [
        'addLinea',
    ];

    public function render()
    {
        return view('livewire.modals.lineas-modal');
    }

    public function save()
    {
        $this->validate();

        $this->closeModalWithEvents([
            RegistroParticipantes::class => [
                'addLinea',
                [
                    $this->_id,
                    $this->nombre,
                    $this->descripcion,
                ]
            ] // Ejecuta el metodo y le envia los valores del formulario            
        ]);

        //reseteamos los valores
        $this->nombre = "";
        $this->descripcion = "";
    }
}
