<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Supplier;

class SupplierSettingComponent extends Component
{
    public $suppliers,$supplier_id;
    public $name,$phone,$address,$email,$website;
    public $updateMode = false;
    public $createMode = false;
    public $selectedItem;
    public function render()
    {
        $this->suppliers = Supplier::all();
        return view('livewire.supplier.supplier_settings')->extends('layouts.admin.base')->section('content');
    }
    private function resetInputFields(){
        $this->name='';
        $this->phone='';
        $this->address='';
        $this->email='';
        $this->website='';
    }

    public function add(){
        $this->createMode=true;
        $this->dispatchBrowserEvent('contentChanged');
    }
    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'phone' => 'required|unique:suppliers,phone',
            'address' => 'required',
        ]);
        if($this->email)
            $validatedData['email']=$this->email;
        if($this->website)
            $validatedData['website']=$this->website;
        supplier::create($validatedData);

        session()->flash('message', 'supplier Created Successfully.');

        $this->resetInputFields();
        $this->createMode=false;
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $supplier = Supplier::where('id',$id)->first();
        $this->supplier_id = $id;
        $this->name = $supplier->name;
        $this->phone = $supplier->phone;
        $this->address = $supplier->address;
        $this->email = $supplier->email;
        $this->website = $supplier->website;
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        $this->dispatchBrowserEvent('contentChanged');

    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        if($this->email)
            $validatedData['email']=$this->email;
        if($this->website)
            $validatedData['website']=$this->website;
        if ($this->supplier_id) {
            $supplier = Supplier::find($this->supplier_id);
            $supplier->update([
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'email' => $this->email,
                'website' => $this->website,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Supplier Updated Successfully.');
            $this->resetInputFields();

        }
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function selectItem($itemId)
    {
        $this->selectedItem = $itemId;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function delete()
    {
        Supplier::where('id',$this->selectedItem)->delete();
        $this->dispatchBrowserEvent('closeDeleteModal');
        session()->flash('message', 'Product Deleted Successfully.');
    }
    public function refresh(){
        $this->dispatchBrowserEvent('refresh');
    }
}
