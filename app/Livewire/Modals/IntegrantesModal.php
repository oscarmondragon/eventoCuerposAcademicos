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


    #[Validate('required|max:30')]
    public $nombre = '';

    #[Validate('required|max:30')]
    public $apellidoPaterno = '';

    public $apellidoMaterno = '';

    #[Validate('required_if:isLider,1')]
    public $tipoLider = '';

    #[Validate('required|max:100')]
    public $gradoAcademico = '';

    #[Validate('required|max:20')]
    public $gradoAcademicoAbrev = '';

    #[Validate('required')]
    public $sexo = '';

    #[Validate('required')]
    public $genero = '';


    #[Validate('required|email')]
    public $correo = '';

    #[Validate('required')]
    public $telefono = '';


    public $listeners = [
        'addIntegrante',
    ];

    protected $messages = [
        'nombre.required' => 'El nombre no puede estar vacío.',
        'nombre.max' => 'El nombre acepta máximo 30 caracteres.',
        'apellidoPaterno.required' => 'El apellido paterno no puede estar vacío.',
        'apellidoPaterno.max' => 'El apellido paterno acepta máximo 30 caracteres.',
        'tipoLider.required_if' => 'El tipo de lider es obligatorio.',
        'gradoAcademico.required' => 'El grado académico no puede estar vacío.',
        'gradoAcademico.max' => 'El grado académico acepta máximo 100 caracteres.',
        'gradoAcademicoAbrev.required' => 'El grado académico no puede estar vacío.',
        'gradoAcademicoAbrev.max' => 'El grado académico acepta máximo 20 caracteres.',
        'sexo.required' => 'Seleccione el sexo.',
        'genero.required' => 'Seleccione el genero.',
        'genero.gt' => 'Seleccione el genero.',
        'correo.required' => 'El correo electrónico no puede estar vacío.',
        'correo.email' => 'Debe ser un coreo electrónico valido.',
        'telefono.required' => 'El telefono no puede estar vacío.'
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
