<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;


new #[Layout('layouts.publico')] class extends Component
{
    //

    public function registrar(): void
    {
        
        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div>
    //
    <h1>Registro</h1>
</div>
