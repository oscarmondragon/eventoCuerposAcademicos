<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Registro;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Notifications\RegistroAprobado;
use App\Notifications\RegistroRechazado;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.app')]

class RegistroDetail extends Component
{

    public $id; //parametro recibido por la ruta
    public $registro; // alamcena todo el registro si existe el id en la BD

    public $estatusOptions = ['Aprobar', 'Rechazar'];

    #[Validate('required|in_array:estatusOptions.*')]
    public $estatusSelected;

    public $estatusDB = null;


    #[Validate('required_if:estatusSelected,Rechazar|min:3|max:255')]
    public $observaciones = '';



    protected $messages = [
        'estatusSelected.required' => 'Debes asignarle un estatus al registro',
        'estatusSelected.in_array' => 'Selecciona un estatus',
        'observaciones.required_if' => 'El campo observaciones no puede estar vacio',
        'observaciones.min' => 'El campo observaciones debe contener al menos 3 caracteres',
        'observaciones.max' => 'El campo observaciones es demasiado largo.',
    ];

    public $listeners = [
        'save'
    ];

    public function mount($id)
    {
        try {
            $this->registro = Registro::with('archivos', 'integrantes', 'lineas', 'area.area', 'subareas.subarea', 'banner', 'fortalezasNecesidades')->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        $this->estatusDB = $this->registro->aprobacion;

        if ($this->estatusDB === 0) {

            $this->estatusSelected = 'Rechazar';
            $this->estatusDB = 'Rechazar';
            $this->observaciones = $this->registro->observaciones;
        }

        if ($this->estatusDB === 1) {

            $this->estatusSelected = 'Aprobar';
            $this->estatusDB = 'Aprobar';

        }

        //dd($this->registro->banner->integrantes);
    }
    public function render()
    {
        return view('livewire.admin.registro-detail');
    }

    public function save()
    {
        $this->validate();
        if ($this->estatusSelected != $this->estatusDB) { //si el estatus es diferente al que tiene actualmente el registro lo cambia si no no hace nada
            DB::beginTransaction();
            try {
                if ($this->estatusSelected == 'Aprobar') {
                    $this->registro->aprobacion = 1;
                    $this->registro->observaciones = null;
                } else if ($this->estatusSelected == 'Rechazar') {
                    $this->registro->aprobacion = 0;
                    $this->registro->observaciones = $this->observaciones;
                }

                $this->registro->user_id = auth()->user()->id;

                $this->registro->save();
                DB::commit();

                //Notificaciones por correo
                if ($this->registro->aprobacion == 1) {
                    $this->registro->notify(new RegistroAprobado($this->registro));
                } else if ($this->registro->aprobacion == 0) {
                    $this->registro->notify(new RegistroRechazado($this->registro));
                }

                return redirect('/participantes')->with('success', '¡Se ha actualizado el estatus del registro correctamente!.');
            } catch (\Exception $e) {
                DB::rollback();
                dd("Error en catch:" . $e);
                return redirect()->back()->with('error', 'Error en el proceso de guardado ' . $e->getMessage());
            }
        } else {
            return redirect('/participantes');

        }

    }

    public function descargarArchivo($rutaArchivo)
    {
        $ruta = storage_path('app/' . $rutaArchivo);

        if (file_exists($ruta)) {
            return response()->download($ruta);
        } else {
            abort(404);
        }
    }
}
