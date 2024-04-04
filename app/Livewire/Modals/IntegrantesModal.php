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


    #[Validate('required|max:30|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/u')]
    public $nombre = '';

    #[Validate('required|max:30|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/u')]
    public $apellidoPaterno = '';

    #[Validate('nullable|max:30|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/u')]
    public $apellidoMaterno = '';

    #[Validate('required_if:isLider,1')]
    public $tipoLider = '';

    #[Validate('required|max:100|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/u')]
    public $gradoAcademico = '';

    #[Validate('required|max:20|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ.\s]*$/u')]
    public $gradoAcademicoAbrev = '';

    #[Validate('required')]
    public $sexo = '';

    #[Validate('required')]
    public $genero = '';


    #[Validate('required|email|max:100')]
    public $correo = '';

    #[Validate('required|min:10|max:15|regex:/^[0-9()+]*$/u')]
    public $telefono = '';


    public $listeners = [
        'addIntegrante',
    ];

    protected $messages = [
        'nombre.required' => 'El nombre no puede estar vacío.',
        'nombre.max' => 'El nombre acepta máximo 30 caracteres.',
        'nombre.regex' => 'El nombre no puede tener caracteres especiales.',

        'apellidoPaterno.required' => 'El apellido paterno no puede estar vacío.',
        'apellidoPaterno.max' => 'El apellido paterno acepta máximo 30 caracteres.',
        'apellidoPaterno.regex' => 'El apellido paterno no puede tener caracteres especiales.',

        'apellidoMaterno.max' => 'El apellido materno acepta máximo 30 caracteres.',
        'apellidoMaterno.regex' => 'El apellido materno no puede tener caracteres especiales.',

        'tipoLider.required_if' => 'El tipo de lider es obligatorio.',

        'gradoAcademico.required' => 'El grado académico no puede estar vacío.',
        'gradoAcademico.max' => 'El grado académico acepta máximo 100 caracteres.',
        'gradoAcademico.regex' => 'El grado académico no puede contener caracteres especiales.',

        'gradoAcademicoAbrev.required' => 'El grado académico abreviado no puede estar vacío.',
        'gradoAcademicoAbrev.max' => 'El grado académico abreviado acepta máximo 20 caracteres.',
        'gradoAcademicoAbrev.regex' => 'El grado académico abreviado no puede contener caracteres especiales.',

        'sexo.required' => 'Seleccione el sexo.',
        'genero.required' => 'Seleccione el genero.',
        'genero.gt' => 'Seleccione el genero.',

        'correo.required' => 'El correo electrónico no puede estar vacío.',
        'correo.email' => 'El coreo electrónico no tiene un formato valido.',
        'correo.max' => 'El correo electrónico es demasiado largo.',

        'telefono.required' => 'El telefono no puede estar vacío.',
        'telefono.min' => 'El teléfono debe de contener al menos 10 dígitos.',
        'telefono.max' => 'El teléfono es demasiado largo.',
        'telefono.regex' => 'El formato del teléfono no es valido (Solo acepta los caracteres especiales: (), +).',
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
