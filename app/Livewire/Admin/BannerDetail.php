<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Registro;
use Livewire\Attributes\Layout;
use Illuminate\Database\Eloquent\ModelNotFoundException;

#[Layout('layouts.app')]

class BannerDetail extends Component
{

    public $id; //parametro recibido por la ruta
    public $registro;


    public function mount($id)
    {

        try {
            $this->registro = Registro::with('banner', 'integrantes')->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        //dd($this->registro->integrantes);
    }
    public function render()
    {
        return view('livewire.admin.banner-detail');
    }
}
