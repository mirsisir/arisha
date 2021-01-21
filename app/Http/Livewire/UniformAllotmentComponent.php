<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UniformSettings;
use App\Models\UniformAllotment;
use App\Models\Employee;

class UniformAllotmentComponent extends Component
{
    public $employees=[];
    public $products=[];
    public $uniforms,$uniform_id;
    public $employee_id,$product_id,$quantity,$date,$unit,$user_id,$s_employee_id,$s_product_id,$s_employee_name ,$s_product_name;
    public $updateMode = false;
    public $createMode = false;
    public function render()
    {
        
        $this->uniforms = UniformAllotment::all();
        return view('livewire.uniform.allotments.uniform_allotment_index')->extends('layouts.admin.base')->section('content');
    }
    private function resetInputFields(){
        $this->employee_id='';
        $this->product_id='';
        $this->quantity='';
        $this->date='';
        $this->unit='';
    }
    public function mount(){
        
        $this->employees=Employee::all();
        $this->products=UniformSettings::all();
       // $this->createMode=true;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'employee_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'date' => 'required',
        ]);
        $validatedData['user_id']=auth()->user()->id;
        UniformAllotment::create($validatedData);

        session()->flash('message', 'Uniform Allocated Successfully.');

        $this->resetInputFields();
        $this->createMode=false;


    }

    public function edit($id)
    {
        $this->updateMode = true;
        $uniform = UniformAllotment::where('id',$id)->first();
        $this->uniform_id = $uniform->id;
        $this->s_employee_id = $uniform->employee_id;
        $this->s_product_id = $uniform->product_id;
        $this->s_employee_name = $uniform->employee->name;
        dd($this->s_employee_name);
        $this->s_product_name = $uniform->product->product_name;
        $this->quantity = $uniform->quantity;
        $this->date = $uniform->date;
    }
    
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'employee_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'date' => 'required',
        ]);
        if ($this->uniform_id) {
            
            $uniform = UniformAllotment::find($this->uniform_id);
            $uniform->update([
                'employee_id' => $this->employee_id,
                'product_id' => $this->product_id,
                'quantity' => $this->quantity,
                'date' => $this->date,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Uniform Allocation Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            UniformAllotment::where('id',$id)->delete();
            session()->flash('message', 'Uniform Allocation Deleted Successfully.');
        }
    }
}
