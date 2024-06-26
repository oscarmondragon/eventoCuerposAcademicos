<?php

namespace App\Livewire\Participantes;

use App\Enums\InteresesForm;
use App\Enums\MotivosInteresadosForm;
use App\Enums\SectoresForm;
use App\Livewire\Forms\InteresadosForm;
use App\Models\Area;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('layouts.publico')]

class RegistroInteresados extends Component
{

    public InteresadosForm $form;

    public $areasTematicas;
    public $motivosInteresados;
    public $sectores;
    public $intereses;


    public function mount()
    {
        $this->areasTematicas = Area::all();
        $this->form->motivos = collect();
        $this->motivosInteresados = MotivosInteresadosForm::cases();
        $this->intereses = InteresesForm::cases();
        $this->sectores = SectoresForm::cases();
    }

    public function render()
    {
        return view('livewire.participantes.registro-interesados');
    }

    public function save()
    {
        $this->form->store();

        return redirect('/registro-creado')->with('success', 'Sus datos han sido guardados correctamente.');
    }

    public function addMotivo($motivo)
    {
        $existe = 0;
        $index = null;

        foreach ($this->form->motivos as $mot => $key) {
            if ($key == $motivo) {
                $existe = 1;
                $index = $mot;
            }
        }

        if ($existe == 1) {
            $this->form->motivos->forget($index);
        } else {
            $this->form->motivos->push(
                $motivo
            );
        }
        $this->form->motivos->all();

        $otro = $this->form->motivos->search('Otro');
        if ($otro !== false) {
            $this->form->otroMotivo = true;
        } else {
            $this->form->otroMotivo = false;
            $this->form->descripcionMotivo = null;
        }

        $this->validateOnly($this->form->motivos);
    }

    public function limpiarCampos()
    {
        $this->form->resetFields();
        $this->motivosInteresados = collect($this->motivosInteresados);
        $this->form->comentario = "";
    }
}
