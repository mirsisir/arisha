<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

class BrandSettingComponent extends Component
{
    public $brands,$brand_id;
    public $name,$status;
    public $updateMode = false;
    public $createMode = false;
    public $selectedItem;
    protected $listeners = ['delete'];
    public function render()
    {
        
        $this->brands = Brand::all();
        return view('livewire.brand.brand_index')->extends('layouts.admin.base')->section('content');
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
            'name' => 'required|unique:brands,name',
            'status'=>'required',
        ]);

        Brand::create($validatedData);

        session()->flash('message', 'Brand Created Successfully.');

        $this->resetInputFields();
        $this->createMode=false;
        $this->dispatchBrowserEvent('contentChanged');

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $brand = Brand::where('id',$id)->first();
        $this->brand_id = $id;
        $this->name = $brand->name;
        $this->status = $brand->status;
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

        if ($this->brand_id) {
            $brand = Brand::find($this->brand_id);
            $brand->update([
                'name' => $this->name,
                'status' => $this->status,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Brand Updated Successfully.');
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
        Brand::where('id',$id)->delete();
        $this->dispatchBrowserEvent('success',['message' => "Brand Deleted"]);
    }
    public function refresh(){
        $this->dispatchBrowserEvent('refresh');
    }
}
