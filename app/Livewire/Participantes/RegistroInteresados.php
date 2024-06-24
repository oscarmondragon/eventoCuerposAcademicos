<?php

namespace App\Livewire\Participantes;

use App\Enums\InteresesForm;
use App\Enums\MotivosInteresadosForm;
use App\Enums\SectoresForm;
use App\Models\Area;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('layouts.publico')]

class RegistroInteresados extends Component
{
    #[Validate('required')]
    public $areaTematica;

    #[Validate('required|max:150|')]
    public $cuerpoAcademico;

    #[Validate('required|max:100')]
    public $representanteContacto;

    #[Validate('required|max:100')]
    public $nombreInteresado;

    #[Validate('required|max:150')]
    public $institucion;

    #[Validate('required|max:100')]
    public $puesto;

    #[Validate("required|email|max:100|regex:'^[^@]+@[^@]+\.[a-zA-Z]{2,}$'")]
    public $email;

    #[Validate('required|min:10|max:15')]
    public $telefono;

    #[Validate('required')]
    public $sector;

    #[Validate('required_if:sector,Otro')]
    public $descripcionSector;

    #[Validate('required')]
    public $interes;

    #[Validate('required')]
    public $motivos;

    #[Validate('required_if:otroMotivo,true')]
    public $descripcionMotivo;

    #[Validate('required')]
    public $comentario;


    public $areasTematicas;
    public $motivosInteresados;
    public $sectores;
    public $intereses;
    public $otroMotivo = false;

    protected $messages = [
        'areaTematica.required' => 'El área temática no puede estar vacía.',
        'cuerpoAcademico.required' => 'El cuerpo académico no puede estar vacío.',
        'cuerpoAcademico.max' => 'El nombre del cuerpo académico es demasiado largo.',
        'representanteContacto.required' => 'El nombre del representante que establece contacto no puede estar vacío.',
        'representanteContacto.max' => 'El nombre del representante que establece contacto es demasiado largo.',
        'nombreInteresado.required' => 'El nombre no puede estar vacío.',
        'nombreInteresado.max' => 'El nombre es demasiado largo.',
        'institucion.required' => 'El nombre de la institución no puede estar vacío.',
        'institucion.max' => 'El nombre de la institución es demasiado largo.',
        'puesto.required' => 'El nombre del puesto no puede estar vacío.',
        'puesto.max' => 'El nombre del puesto es demasiado largo.',
        'email.required' => 'El correo electrónico no puede estar vacío.',
        'email.email' => 'El correo electrónico no tiene un formato valido.',
        'email.max' => 'El correo electrónico es demasiado largo.',
        'email.regex' => 'El correo electrónico no tiene un formato valido.',
        'telefono.required' => 'El número telefónico no puede estar vacío.',
        'telefono.max' => 'El número telefónico es demasiado largo.',
        'telefono.min' => 'El número telefónico debe de contener al menos 10 dígitos.',
        'sector.required' => 'El sector no puede estar vacío.',
        'descripcionSector.required_if' => 'La descripción del sector no puede estar vacía.',
        'interes.required' => 'El interés no puede estar vacío.',
        'motivos.required' => 'Selecciona al menos un motivo.',
        'descripcionMotivo.required_if' => 'Describe el motivo.',
        'comentario.required' => 'El comentario no puede estar vacío.',
    ];

    public function mount()
    {
        $this->areasTematicas = Area::all();
        $this->motivos = collect();

        $this->motivosInteresados = MotivosInteresadosForm::cases();

        $this->intereses =  InteresesForm::cases();
        $this->sectores = SectoresForm::cases();
    }

    public function render()
    {
        return view('livewire.participantes.registro-interesados');
    }

    public function save()
    {
        $this->validate();
        dd("save");
    }

    public function addMotivo($motivo)
    {
        $existe = 0;
        $index = null;

        foreach ($this->motivos as $mot => $key) {
            if ($key == $motivo) {
                $existe = 1;
                $index = $mot;
            }
        }

        if ($existe == 1) {
            $this->motivos->forget($index);
        } else {
            $this->motivos->push(
                $motivo
            );
        }
        $this->motivos->all();

        $otro = $this->motivos->search('Otro');
        if ($otro !== false) {
            $this->otroMotivo = true;
        } else {
            $this->otroMotivo = false;
            $this->descripcionMotivo = null;
        }

        $this->validateOnly($this->motivos);
    }

    public function limpiarCampos()
    {
    }
}
