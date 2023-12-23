<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PermissionForm extends Form
{
    //
    public function render()
    {
        return view('livewire.forms.permission-form');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|min:3|unique:permissions, name'
        ]);
    }
}
