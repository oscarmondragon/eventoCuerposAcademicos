<?php

namespace App\Livewire\Forms;

use App\Models\Interesado;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;

class InteresadosForm extends Form
{
    //
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
    public $telefono = "";

    #[Validate('required')]
    public $sector = "";

    #[Validate('required_if:sector,Otro')]
    public $descripcionSector;

    #[Validate('required')]
    public $interes = "";

    #[Validate('required')]
    public $motivos;

    #[Validate('required_if:otroMotivo,true')]
    public $descripcionMotivo = "";

    #[Validate('max:255')]
    public $comentario = "";


    public $otroMotivo = false; //bandera para mostrar campo de otro motivo


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
        'comentario.max' => 'El comentario es demasiado largo, solo permite máximo 255 caracteres.',
    ];
    public function mount()
    {
        $this->motivos = collect();

    }

    public function store()
    {
        // dd($this->descripcionSector);
        $this->validate();

        DB::beginTransaction();
        try {
            Interesado::create([
                'area_id' => $this->areaTematica,
                'cuerpo_red_grupo' => $this->cuerpoAcademico,
                'representante_contacto' => $this->representanteContacto,
                'nombre_interesado' => $this->nombreInteresado,
                'institucion' => $this->institucion,
                'puesto' => $this->puesto,
                'email' => $this->email,
                'telefono' => $this->telefono,
                'sector' => $this->sector,
                'otro_sector' => $this->descripcionSector,
                'interes' => $this->interes,
                'motivos' => $this->motivos,
                'otro_motivo' => $this->descripcionMotivo,
                'comentario' => $this->comentario
            ]);

            $this->reset();

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('errorDb', 'Error al guardar los datos. Por favor, revisa que todos los campos esten correctamente llenados e intente más tarde. 
            Si el problema persiste contacte al administrador del sistema. ' . $e->getMessage());
        }
    }

    public function resetFields()
    {
        $this->reset();

        $this->motivos = collect($this->motivos);

        $this->otroMotivo = false;

    }

}
