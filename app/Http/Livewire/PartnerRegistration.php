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
    public $city;
    public $country = 'Bangladesh';
    public $mobile;
    public $phone;
    public $email;

    public $bank;
    public $branch;
    public $acc_name;
    public $acc_number;

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
            'father' => 'required',
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
