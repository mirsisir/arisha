<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UniformSettings;

class UniformSettingComponent extends Component
{
    public $settings,$product_id;
    public $product_name,$stock;
    public $updateMode = false;
    public $createMode = false;
    public $selectedItem;
    protected $listeners = ['delete'];
    public function render()
    {
        
        $this->settings = UniformSettings::all();
        return view('livewire.uniform.settings.uniform_setting_index')->extends('layouts.admin.base')->section('content');
    }
    private function resetInputFields(){
        $this->product_name = '';
        $this->stock = '';
    }

    public function add(){
        $this->createMode=true;
        $this->dispatchBrowserEvent('contentChanged');
    }
    public function store()
    {
        $validatedData = $this->validate([
            'product_name' => 'required|unique:uniform_settings,product_name',
            'stock'=>'required',
        ]);

        UniformSettings::create($validatedData);

        session()->flash('message', 'Uniform Created Successfully.');

        $this->resetInputFields();
        $this->createMode=false;
        $this->dispatchBrowserEvent('contentChanged');

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $uniform = UniformSettings::where('id',$id)->first();
        $this->product_id = $id;
        $this->product_name = $uniform->product_name;
        $this->stock = $uniform->stock;
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'product_name' => 'required',
            'stock'=>'required'
        ]);

        if ($this->product_id) {
            $uniform = UniformSettings::find($this->product_id);
            $uniform->update([
                'product_name' => $this->product_name,
                'stock' => $this->stock,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Uniform Updated Successfully.');
            $this->resetInputFields();

        }
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function selectItem($itemId)
    {
        $this->selectedItem = $itemId;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function delete($id)
    {
        UniformSettings::where('id',$id)->delete();
        $this->dispatchBrowserEvent('success',['message' => "Uniform Deleted"]);
    }
    public function refresh(){
        $this->dispatchBrowserEvent('refresh');
    }
    
}
