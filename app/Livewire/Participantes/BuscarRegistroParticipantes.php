<?php

namespace App\Livewire\Participantes;

use App\Models\Registro;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.publico')]

class BuscarRegistroParticipantes extends Component
{

    #[Validate('required|email|max:100')]
    public $email;
    public $registroFound = null; //para revisar si el id del registro existe
    public $encontradoMessage;

    protected $messages = [
        'email.required' => 'Digita el correo electrónico del registro que deseas buscar.',
        'email.email' => 'El coreo electrónico no tiene un formato valido.',
        'email.max' => 'El correo electrónico es demasiado largo.',
    ];


    public function mount()
    {
        $this->encontradoMessage = session('encontrado');
    }
    public function render()
    {
        return view('livewire.participantes.buscar-registro-participantes');
    }

    public function consultar()
    {
        $this->validate();
        $registroBuscar = Registro::where('email', $this->email)->first();

        if ($registroBuscar) {
            $this->registroFound = $registroBuscar;

            if ($this->registroFound->adjuntoPago == 1) {
                return redirect()->back()->with('encontrado', 'Ya has completado el registro, lo estamos revisando. Serás notificado a traves de este correo electrónico de cualquier observación o bien la confirmación de asistencia al evento. Gracias por tu interés.');

            } else {
                return redirect()->route('boucher.completar', ['id' => $this->registroFound->id]);
            }
        } else {
            return redirect()->back()->with('noEncontrado', 'No existe ningun registro con este correo electrónico.');
        }

    }
}
