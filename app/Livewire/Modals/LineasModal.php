<?php

namespace App\Livewire\Modals;

use App\Livewire\Participantes\RegistroParticipantes;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class LineasModal extends ModalComponent
{
    public $_id = 0;

    #[Validate('required|max:50')]
    public $nombre = '';

    #[Validate('required|max:500')]
    public $descripcion = '';

    public $listeners = [
        'addLinea',
    ];


    protected $messages = [
        'nombre.required' => 'El nombre no puede estar vacío.',
        'nombre.max' => 'El nombre es demasiado largo.',
        'descripcion.required' => 'La descripción  no puede estar vacía.',
        'descripcion.max' => 'La descripción acepta máximo 500 caracteres.',

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
