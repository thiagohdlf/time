<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use App\Models\Permission;

class PermissionForm extends Component
{

    public ?Permission $data;

    public $name = '';

    public $description = '';

    public function mount(Permission $data)
    {
        $this->name = $data->name;
        $this->description = $data->description;
    }

    /*public function setForm(Permission $data)
    {
        $this->form = $data;
        $this->name = $data->name;
        $this->description = $data->description;
    }*/

    public function save()
    {

        echo 'edit';
        $this->form->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->redirect('/admin/permissao');
    }

    public function render()
    {
        return view('livewire.forms.permission-form');
    }
}
