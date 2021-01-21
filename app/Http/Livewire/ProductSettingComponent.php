<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;
use App\Models\ProductInfo;

class ProductSettingComponent extends Component
{
    public $products,$product_id,$delete_id,$brands,$brand_name,$selected_brand_id;
    public $name,$brand_id,$group,$stock,$unit,$user_id;
    public $updateMode = false;
    public $createMode = false;
    public $selectedItem;
    public function render()
    {
        $this->products = ProductInfo::all();
        return view('livewire.product.product_settings')->extends('layouts.admin.base')->section('content');
    }
    private function resetInputFields(){
        $this->name='';
        $this->brand_id='';
        $this->group='';
        $this->stock='';
        $this->unit='';
    }
    public function add(){
        $this->createMode=true;
        $this->brands=Brand::where('status',"Active")->get();
        $this->dispatchBrowserEvent('addEvent');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'brand_id' => 'required',
            'group' => 'required',
            'unit' => 'required',
        ]);
        
        $validatedData['user_id']=auth()->user()->id;
        ProductInfo::create($validatedData);

        session()->flash('message', 'Product Created Successfully.');

        $this->resetInputFields();
        $this->createMode=false;
        $this->dispatchBrowserEvent('contentChanged');

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $product = ProductInfo::where('id',$id)->first();
        $this->brands=Brand::where('id','!=',$product->brand_id)->where('status',"Active")->get();
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->selected_brand_id = $product->brand_id;
        $this->brand_name = $product->brand->name;
        $this->group = $product->group;
        $this->stock = $product->stock;
        $this->unit = $product->unit;
        $this->dispatchBrowserEvent('addEvent');
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
            'brand_id' => 'required',
            'group' => 'required',
            'unit' => 'required',
        ]);
        if ($this->product_id) {
            
            $product = ProductInfo::find($this->product_id);
            $product->update([
                'name' => $this->name,
                'brand_id' => $this->brand_id,
                'group' => $this->group,
                'stock' => $this->stock,
                'unit' => $this->unit,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Product Updated Successfully.');
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
        ProductInfo::where('id',$this->selectedItem)->delete();
        $this->dispatchBrowserEvent('closeDeleteModal');
        $this->dispatchBrowserEvent('refresh');
        session()->flash('message', 'Product Deleted Successfully.');
    }
    public function refresh(){
        $this->dispatchBrowserEvent('refresh');
    }
    
}
