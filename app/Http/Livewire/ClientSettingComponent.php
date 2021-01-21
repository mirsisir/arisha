<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ClientSetting;

class ClientSettingComponent extends Component
{
    public $clients,$client_id;
    public $company_name,$website,$phone_no,$email,$address,$contact_person,$contact_mobile,$bill_amount,$vat_amount;
    public $updateMode = false;
    public $createMode = false;
    public $selectedItem;
    public function render()
    {
        $this->clients = ClientSetting::all();
        return view('livewire.client.settings.client_setting_index')->extends('layouts.admin.base')->section('content');
    }

    private function resetInputFields(){
        $this->company_name='';
        $this->website='';
        $this->phone_no='';
        $this->email='';
        $this->address='';
        $this->contact_person='';
        $this->contact_mobile='';
        $this->bill_amount='';
        $this->vat_amount='';
    }

    public function add(){
        $this->createMode=true;
        $this->dispatchBrowserEvent('contentChanged');
    }
    function store(){
        $validatedData = $this->validate([
            'company_name' => 'required',
            
            'phone_no' => 'required|unique:client_settings,phone_no',
            
            'address' => 'required',
            'contact_person' => 'required',
            'contact_mobile' => 'required',
            'bill_amount' => 'required',
            'vat_amount' => 'required',
        ]);
        if($this->website)
            $validatedData['website']=$this->website;
        if($this->email)
            $validatedData['email']=$this->email;  
        ClientSetting::create($validatedData);

        session()->flash('message', 'Client Created Successfully.');

        $this->resetInputFields();
        $this->createMode=false;
        $this->dispatchBrowserEvent('contentChanged');
    }
    public function edit($id)
    {
        $this->updateMode = true;
        $client = ClientSetting::where('id',$id)->first();
        $this->client_id = $id;
        $this->company_name = $client->company_name;
        $this->website = $client->website;
        $this->phone_no = $client->phone_no;
        $this->email = $client->email;
        $this->address = $client->address;
        $this->contact_person = $client->contact_person;
        $this->contact_mobile = $client->contact_mobile;
        $this->bill_amount = $client->bill_amount;
        $this->vat_amount = $client->vat_amount;
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
            'company_name' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'contact_mobile' => 'required',
            'bill_amount' => 'required',
            'vat_amount' => 'required',
        ]);

        if ($this->client_id) {
            $client = ClientSetting::find($this->client_id);
            $client->update([
                'company_name' => $this->company_name,
                'website' => $this->website,
                'phone_no' => $this->phone_no,
                'email' => $this->email,
                'address' => $this->address,
                'contact_person' => $this->contact_person,
                'contact_mobile' => $this->contact_mobile,
                'bill_amount' => $this->bill_amount,
                'vat_amount' => $this->vat_amount,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'client Updated Successfully.');
            $this->resetInputFields();
            $this->dispatchBrowserEvent('contentChanged');
        }
    }

    public function selectItem($itemId)
    {
        $this->selectedItem = $itemId;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function delete()
    {
        ClientSetting::where('id',$this->selectedItem)->delete();
        $this->dispatchBrowserEvent('closeDeleteModal');
        session()->flash('message', 'Product Deleted Successfully.');
    }
    public function refresh(){
        $this->dispatchBrowserEvent('refresh');
    }
}
