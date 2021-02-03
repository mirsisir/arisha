<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\Employee;
use Livewire\Component;
use Livewire\WithFileUploads;

class PartnerRegistration extends Component
{
    use WithFileUploads;

    public $fname;
    public $lname;
    public $dob;
    public $gender;
    public $status;
    public $father;
    public $nation = 'Bangladeshis';
    public $nid;
    public $photo;

    public $address;
    public $street;
    public $city;

    public $multi = [];

    public $country = 'Bangladesh';
    public $mobile;
    public $phone;
    public $email;

    public $bank;
    public $branch;
    public $acc_name;

    public $bank_account;

    public $emp_id;
    public $department_id;
    public $designation_id;
    public $join_date;

    public $resume;
    public $offer_let;
    public $join_let;
    public $contact_paper;
    public $id_proff;
    public $other;
    public $nid_card;
    public $house_clearence;

    public function mount ()
    {
        $this->join_date = date('Y-m-d');
    }

    public function store()
    {
        $data = $this->validate([
            'fname' => 'required',
            'lname' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'nation' => '',
            'nid' => 'required',
            'photo' => 'required|image|max:1024',

            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'mobile' => 'required',
            'email' => 'required',


        ]);

        if($this->photo){
            $photoPath = $this->photo->store('photos', 'public');
            $photoArray = ['photo' => $photoPath];
        }


        Employee::create(array_merge(
            $data,
            $photoArray ?? [],

        ));
        session()->flash('success', 'Employee successfully Inserted.');
        return redirect('/');
    }

    public function render()
    {


        return view('livewire.partner-registration')->layout('layouts.web.web_base');
    }
}
