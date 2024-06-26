<?php

namespace App\Livewire\Forms;

use App\Models\Asistente;
use Livewire\Form;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;

class AsistentesForm extends Form
{
    #[Validate('required|max:50')]
    public $nombre;

    #[Validate('required|max:50')]
    public $apellidoPaterno;

    public $apellidoMaterno;

    #[Validate("required|email|max:100|regex:'^[^@]+@[^@]+\.[a-zA-Z]{2,}$'")]
    public $email;

    #[Validate('required|min:10|max:15')]
    public $telefono;

    #[Validate('required|max:150')]
    public $lugarOrigen;

    #[Validate('required|max:150')]
    public $dependencia;

    #[Validate('required')]
    public $tipo;

    #[Validate('required_if:tipo,Otro|max:100')]
    public $otroTipo;

    #[Validate('required|max:150')]
    public $interes;

    #[Validate('max:255')]
    public $comentario;

    protected $messages = [

        'nombre.required' => 'El nombre no puede estar vacío.',
        'nombre.max' => 'El nombre solo permite máximo 50 caracteres.',
        'apellidoPaterno.required' => 'El apellido paterno no puede estar vacío.',
        'apellidoPaterno.max' => 'El apellido paterno solo permite máximo 50 caracteres.',
        'email.required' => 'El correo electrónico no puede estar vacío.',
        'email.email' => 'El correo electrónico no tiene un formato valido.',
        'email.max' => 'El correo electrónico es demasiado largo.',
        'email.regex' => 'El correo electrónico no tiene un formato valido.',
        'telefono.required' => 'El número telefónico no puede estar vacío.',
        'telefono.max' => 'El número telefónico es demasiado largo.',
        'telefono.min' => 'El número telefónico debe de contener al menos 10 dígitos.',
        'lugarOrigen.required' => 'El lugar de origen no puede estar vacío.',
        'dependencia.required' => 'La dependencia no puede estar vacía.',
        'tipo.required' => 'Selecciona al menos un tipo.',
        'interes.required' => 'El interes de asistencia no puede estar vacío.',
        'comentario.max' => 'El comentario es demasiado largo, solo permite máximo 255 caracteres.',
    ];

    public function store()
    {

        $this->validate();

        DB::beginTransaction();

        try {
            //Insertamos registro
            Asistente::create([
                'nombre' => $this->nombre,
                'apellido_paterno' => $this->apellidoPaterno,
                'apellido_materno' => $this->apellidoMaterno,
                'email' => $this->email,
                'telefono' => $this->telefono,
                'lugar_origen' => $this->lugarOrigen,
                'dependencia' => $this->dependencia,
                'tipo' => $this->tipo,
                'otro_tipo' => $this->otroTipo,
                'interes' => $this->interes,
                'comentario' => $this->comentario

            ]);
            //reseteamos valores del form
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

    }
}
