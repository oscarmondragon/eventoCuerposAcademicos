<?php

namespace App\Livewire\Participantes;

use App\Models\Registro;
use App\Models\Archivo;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.publico')]

class AdjuntarBoucherCorreo extends Component
{
    use WithFileUploads;

    public $registroFound = null; //para revisar si el id del registro existe

    #[Validate('required|mimes:jpg,pdf,png|max:2048')]
    public $boucher;


    protected $messages = [
        'boucher.max' => 'El archivo debe pesar máximo 2 MB.',
        'boucher.required' => 'No ha seleccionado ningun archivo.',
        'boucher.mimes' => 'El archivo debe ser de tipo: jpg, pdf, png.',

    ];

    public function mount($id)
    {
        $registroBuscar = Registro::find($id);
        if ($registroBuscar) {
            $this->registroFound = $registroBuscar;
        }

    }
    public function render()
    {
        if ($this->registroFound != null) {
            return view('livewire.participantes.adjuntar-boucher-correo');
        } else {
            return view('livewire.participantes.error-participantes');
        }
    }

    public function save()
    {
        $this->validate();


        DB::beginTransaction();
        try {
            //GUARDAMOS EL BOUCHER
            //Guardar en sistema de archivos
            $ruta_boucher = "public/" . $this->registroFound->id . "/Pago/";
            $extension = $this->boucher->getClientOriginalExtension();

            $this->boucher->storeAs($ruta_boucher, 'comprobante_pago.' . $extension);

            $rutaCompleta = $ruta_boucher . 'comprobante_pago.' . $extension;

            //guardar en DB
            $archivo = new Archivo;

            $archivo->registro_id = $this->registroFound->id;
            $archivo->ruta = $rutaCompleta;
            $archivo->tipo = "Boucher";
            $archivo->user_id = 0; //significa que no lo subio un usuario autenticado
            $archivo->save();


            //ACTUALIZAMOS BANDERA DE PAGO EN REGISTRO
            $this->registroFound->adjuntoPago = 1;
            $this->registroFound->save();

            DB::commit();
            return redirect('/registro-creado')->with('success', 'Su registro  ha sido actualizado correctamente');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al cargar el comprobante de pago. Por favor, intente más tarde. Si el problema persiste contacte al administrador del sistema.' . $e->getMessage());
        }
    }
}
