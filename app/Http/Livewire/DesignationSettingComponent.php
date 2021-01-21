<?php

namespace App\Http\Livewire;

use App\Models\Designation;
use Livewire\Component;

class DesignationSettingComponent extends Component
{
    public $designations,$designation_id;
    public $name,$status;
    public $updateMode = false;
    public $createMode = false;
    public $selectedItem;
    protected $listeners = ['delete'];
    public function render()
    {
        
        $this->designations = Designation::all();
        return view('livewire.designation.designation_index')->extends('layouts.admin.base')->section('content');
    }
    private function resetInputFields(){
        $this->name = '';
        $this->status = '';
    }

    public function add(){
        $this->createMode=true;
        $this->dispatchBrowserEvent('contentChanged');
    }
    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:designations,name',
            'status'=>'required',
        ]);

        Designation::create($validatedData);

        session()->flash('message', 'Designation Created Successfully.');

        $this->resetInputFields();
        $this->createMode=false;
        $this->dispatchBrowserEvent('contentChanged');

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $designation = Designation::where('id',$id)->first();
        $this->designation_id = $id;
        $this->name = $designation->name;
        $this->status = $designation->status;
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
            'name' => 'required',
            'status'=>'required'
        ]);

        if ($this->designation_id) {
            $designation = Designation::find($this->designation_id);
            $designation->update([
                'name' => $this->name,
                'status' => $this->status,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Designation Updated Successfully.');
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
        Designation::where('id',$id)->delete();
        $this->dispatchBrowserEvent('success',['message' => "Designation Deleted"]);
    }
    public function refresh(){
        $this->dispatchBrowserEvent('refresh');
    }
}
