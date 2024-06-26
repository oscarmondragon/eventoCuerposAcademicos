<?php

namespace App\Livewire\Modals;

use App\Livewire\Participantes\RegistroParticipantes;
use App\Models\LineaCatalogo;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Str;

class LineasModal extends ModalComponent
{
    public $_id = 0;

    #[Validate('required|min:3|max:255')]
    public $nombre = '';

    #[Validate('required|min:3|max:400')]
    public $descripcion = '';

    public $tipoRegistro = '';
    public $idCuerpo = '';
    public $lineasInvestigacion;

    public $contadorDescripcion = 0;

    public $listeners = [
        'addLinea',
    ];


    protected $messages = [
        'nombre.required' => 'El nombre no puede estar vacío.',
        'nombre.min' => 'El nombre de la línea es muy corto.',
        'nombre.max' => 'El nombre es demasiado largo.',
        'descripcion.required' => 'La descripción no puede estar vacía.',
        'descripcion.min' => 'La descripción es muy corta.',
        'descripcion.max' => 'La descripción acepta máximo 400 caracteres.',

    ];

    public function render()
    {
        if ($this->tipoRegistro == 1) {
            $this->lineasInvestigacion = LineaCatalogo::where('cuerpo_academico_id', $this->idCuerpo)->get();
        }

        $this->contadorDescripcion = Str::of($this->descripcion)->length();

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

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
