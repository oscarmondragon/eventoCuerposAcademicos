<?php

namespace App\Livewire\Modals;

use App\Livewire\Participantes\RegistroParticipantes;
use Livewire\Attributes\Validate;
use App\Models\TipoLider;
use LivewireUI\Modal\ModalComponent;

class IntegrantesModal extends ModalComponent
{

    public $_id = 0;

    public $tipoRegistro = '';
    public $isLider = "";


    #[Validate('required')]
    public $nombre = '';

    #[Validate('required')]
    public $apellidoPaterno = '';

    public $apellidoMaterno = '';

    #[Validate('required_if:isLider,1')]
    public $tipoLider = '';

    #[Validate('required')]
    public $gradoAcademico = '';

    #[Validate('required')]
    public $gradoAcademicoAbrev = '';

    #[Validate('required')]
    public $sexo = '';

    #[Validate('')]
    public $genero = '';


    #[Validate('required')]
    public $correo = '';

    #[Validate('required')]
    public $telefono = '';


    public $listeners = [
        'addIntegrante',
    ];

    public function render()
    {
        $tiposFiltro = [];

        //Filtramos los tipos de lider de acuerdo a si es externo o interno
        if ($this->tipoRegistro == '1') {
            $tiposFiltro = TipoLider::where('tipo_solicitante', 'Interno')->get();
        } elseif ($this->tipoRegistro == '2') {
            $tiposFiltro = TipoLider::where('tipo_solicitante', 'Externo')->get();
        } else {
            $tiposFiltro = [];
        }
        return view('livewire.modals.integrantes-modal', ['tipos_lider' => $tiposFiltro]);
    }

    public function save()
    {
        $this->validate();

        $this->closeModalWithEvents([
            RegistroParticipantes::class => [
                'addIntegrante',
                [
                    $this->_id,
                    $this->nombre,
                    $this->apellidoPaterno,
                    $this->apellidoMaterno,
                    $this->tipoLider,
                    $this->gradoAcademico,
                    $this->gradoAcademicoAbrev,
                    $this->sexo,
                    $this->genero,
                    $this->correo,
                    $this->telefono,
                    $this->isLider
                ]
            ] // Ejecuta el metodo y le envia los valores del formulario            
        ]);

        //reseteamos los valores
        $this->nombre = "";
        $this->apellidoPaterno = "";
        $this->apellidoMaterno = "";
        $this->tipoLider = "";
        $this->gradoAcademico = "";
        $this->gradoAcademicoAbrev = "";
        $this->sexo = "";
        $this->genero = "";
        $this->correo = "";
        $this->telefono = "";
        $this->isLider = "";


    }
}
