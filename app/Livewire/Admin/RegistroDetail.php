<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Registro;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Illuminate\Database\Eloquent\ModelNotFoundException;


#[Layout('layouts.app')]

class RegistroDetail extends Component
{

    public $id; //parametro recibido por la ruta
    public $registro; // alamcena todo el registro si existe el id en la BD

    public $estatusOptions = ['Aprobar', 'Rechazar'];

    #[Validate('required|in_array:estatusOptions.*')]
    public $estatusSelected;



    #[Validate('required_if:estatusSelected,Rechazar|min:3')]
    public $observaciones = '';



    protected $messages = [
        'estatusSelected.required' => 'Debes asignarle un estatus al registro',
        'estatusSelected.in_array' => 'Selecciona un estatus',
        'observaciones.required_if' => 'El campo observaciones no puede estar vacio',
        'observaciones.min' => 'El campo observaciones debe contener al menos 3 caracteres',
    ];

    public function mount($id)
    {

        try {
            $this->registro = Registro::with('archivos', 'integrantes', 'lineas', 'area.area', 'subareas.subarea', 'banner', 'fortalezasNecesidades')->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        //dd($this->registro->integrantes);
    }
    public function render()
    {
        return view('livewire.admin.registro-detail');
    }

    public function save()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            if ($this->estatusSelected == 'Aprobar') {
                $this->registro->aprobacion = 1;
            } else if ($this->estatusSelected == 'Rechazar') {
                $this->registro->aprobacion = 0;
                $this->registro->observaciones = $this->observaciones;
            }

            $this->registro->save();

            DB::commit();
            return redirect('/participantes')->with('success', '¡Se ha actualizado el estatus del registro correctamente!.');
        } catch (\Exception $e) {
            DB::rollback();
            dd("Error en catch:" . $e);
            return redirect()->back()->with('error', 'Error en el proceso de guardado ' . $e->getMessage());
        }
    }
}