<?php

namespace App\Http\Livewire;

use App\Models\Designation;
use App\Models\Employee;
use Livewire\Component;
use Livewire\WithFileUploads;

class EmployeeSettingComponent extends Component
{
    use WithFileUploads;
    public $employees,$employee_id,$designations,$s_designation_id,$designation_name;
    public $name,$address,$nid,$phone,$image,$new_image,$status,$joining_date,$salary,$designation_id;
    public $updateMode = false;
    public $createMode = false;
    public $selectedItem;
    public function render()
    {
        $this->employees = Employee::all();
        return view('livewire.employee.settings.employee_setting_index')->extends('layouts.admin.base')->section('content');
    }
    private function resetInputFields(){
        $this->name='';
        $this->address='';
        $this->nid='';
        $this->phone='';
        $this->image='';
        $this->designation_id='';
        $this->status='';
        $this->joining_date='';
        $this->salary='';
    }

    public function add(){
        $this->createMode=true;
        $this->status="active";
        $this->designations=Designation::where('status',"Active")->get();
        $this->dispatchBrowserEvent('addEvent');
    }
    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'address' => 'required',
            'nid' => 'required|unique:employees,nid',
            'phone' => 'required|unique:employees,phone',
            'status' => 'required',
            'designation_id'=>'required',
            'joining_date' => 'required',
            'salary' => 'required',
        ]);
        if($this->image){
            $this->validate([
                'image' => 'image|max:1024',
            ]);
            $image_name = md5($this->image . microtime()).'.'.$this->image->extension();
            $this->image->storeAs('employees',$image_name);
            $validatedData['image']=$image_name;
        }
        Employee::create($validatedData);

        session()->flash('message', 'Employee Created Successfully.');

        $this->resetInputFields();
        $this->createMode=false;
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $employee = Employee::where('id',$id)->first();
        $this->designations=Designation::where('id','!=',$employee->designation_id)->where('status',"Active")->get();
        $this->employee_id = $id;
        $this->name = $employee->name;
        $this->address = $employee->address;
        $this->nid = $employee->nid;
        $this->phone = $employee->phone;
        $this->image = $employee->image;
        $this->s_designation_id = $employee->designation_id;
        $this->designation_name = $employee->designation->name;
        $this->status = $employee->status;
        $this->joining_date = $employee->joining_date;
        $this->salary = $employee->salary;
        $this->dispatchBrowserEvent('addEvent');
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
            'address' => 'required',
            'nid' => 'required',
            'phone' => 'required',
            'designation_id'=>'required',
            'status' => 'required',
            'joining_date' => 'required',
            'salary' => 'required',
        ]);
        if($this->new_image){
            $this->validate([
                'new_image' => 'image|max:1024',
            ]);
            $image_name = md5($this->new_image . microtime()).'.'.$this->new_image->extension();
            $this->new_image->storeAs('employees',$image_name);
        }

        if ($this->employee_id) {
            $employee = Employee::find($this->employee_id);
            $employee->update([
                'name' => $this->name,
                'address' => $this->address,
                'nid' => $this->nid,
                'phone' => $this->phone,
                'designation_id'=>$this->designation_id,
                'status' => $this->status,
                'joining_date' => $this->joining_date,
                'salary' => $this->salary,
            ]);
            if($this->new_image){
                $employee->update([
                    'image' => $image_name,
                ]);
            }
            $this->updateMode = false;
            session()->flash('message', 'employee Updated Successfully.');
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
        Employee::where('id',$this->selectedItem)->delete();
        $this->dispatchBrowserEvent('closeDeleteModal');
        session()->flash('message', 'Product Deleted Successfully.');
    }
    public function refresh(){
        $this->dispatchBrowserEvent('refresh');
    }
    
}
