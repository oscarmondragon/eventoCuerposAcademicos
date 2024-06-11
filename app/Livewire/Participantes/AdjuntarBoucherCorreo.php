<?php

namespace App\Livewire\Participantes;

use App\Models\Registro;
use App\Models\Archivo;
use App\Notifications\NewRegistroConPago;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.publico')]

class AdjuntarBoucherCorreo extends Component
{
    use WithFileUploads;

    public $registroFound = null; //para revisar si el id del registro existe

    #[Validate('required|mimes:jpg,pdf,png|max:2048')]
    public $boucher;

    #[Validate('required_unless:boucher,null')]
    public $checkFactura;

    #[Validate('nullable|required_if:checkFactura,1|mimes:pdf|max:2048')]
    public $csf;


    protected $messages = [
        'boucher.max' => 'El archivo debe pesar máximo 2 MB.',
        'boucher.required' => 'No ha seleccionado ningun archivo.',
        'boucher.mimes' => 'El archivo debe ser de tipo: .jpg, .png, .pdf',

        'checkFactura.required_unless' => 'Indica si requieres factura.',

        'csf.max' => 'El archivo CSF debe pesar máximo 2 MB.',
        'csf.required_if' => 'No ha seleccionado ningun archivo.',
        'csf.mimes' => 'El archivo CSF debe ser de tipo: .pdf.',

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
            $archivo = new Archivo;
            $id_boucher = Str::substr(Str::ulid(), 20, 26);
            $ruta_boucher = "public/" . $this->registroFound->id . "/Pago/";
            $extension = $this->boucher->getClientOriginalExtension();

            $this->boucher->storeAs($ruta_boucher, 'comprobante_pago_' . $id_boucher . '.' . $extension);

            $rutaCompleta = $ruta_boucher . 'comprobante_pago_' . $id_boucher . '.' . $extension;

            //guardar en DB
            $archivo->registro_id = $this->registroFound->id;
            $archivo->ruta = $rutaCompleta;
            $archivo->tipo = "Boucher";
            $archivo->user_id = 0; //significa que no lo subio un usuario autenticado
            $archivo->save();

            if (!empty($this->csf) && $this->checkFactura == 1) {
                //Guardar en sistema de archivos
                $archivo = new Archivo;
                $id_csf = Str::substr(Str::ulid(), 20, 26);
                $ruta_csf = "public/" . $this->registroFound->id . "/Pago/";
                $extension = $this->csf->getClientOriginalExtension();

                $this->csf->storeAs($ruta_csf, 'CSF_' . $id_csf . '.' . $extension);

                $rutaCompleta = $ruta_csf . 'CSF_' . $id_csf . '.' . $extension;

                //guardar en DB
                $archivo->registro_id = $this->registroFound->id;
                $archivo->ruta = $rutaCompleta;
                $archivo->tipo = "CSF";
                $archivo->user_id = 0; //significa que no lo subio un usuario autenticado
                $archivo->save();
            }

            //ACTUALIZAMOS BANDERA DE PAGO EN REGISTRO
            $this->registroFound->adjuntoPago = 1;
            $this->registroFound->checkFactura = $this->checkFactura;
            $this->registroFound->save();

            DB::commit();

            $this->registroFound->notify(new NewRegistroConPago($this->registroFound));

            return redirect('/registro-creado')->with('success', 'Se ha adjuntado su evidencia de pago correctamente. Lo estamos validando, te notificaremos por correo electrónico cuando finalicemos.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al cargar el comprobante de pago. Por favor, intente más tarde. Si el problema persiste contacte al administrador del sistema.' . $e->getMessage());
        }
    }

    public function limpiarArchivo($tipoArchivo)
    {
        $this->$tipoArchivo = null;
    }
}
