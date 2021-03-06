<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;
use App\Models\Department;
use App\Models\Designation;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $fname;
    public $lname;
    public $dob;
    public $gender;
    public $status;
    public $father;
    public $nation = 'Germani';
    public $nid;
    public $photo;

    public $address;
    public $city;
    public $country = 'Germany';
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
            'nation' => 'required',
            'nid' => 'required',
            'photo' => 'required|image|max:1024',

            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'mobile' => 'required',
            'email' => 'required',

            'bank' => '',
            'branch' => '',
            'acc_name' => '',
            'acc_number' => '',

            'emp_id' => '',
            'department_id' => '',
            'designation_id' => '',
            'join_date' => '',

            'resume' => 'max:1024',
            'offer_let' => 'max:1024',
            'join_let' => 'max:1024',
            'contact_paper' => 'max:1024',
            'id_proff' => 'max:1024',
            'other' => 'max:1024',

        ]);

            $s = ["active_employee"=>1];


        if($this->photo){
            $photoPath = $this->photo->store('photos', 'public');
            $photoArray = ['photo' => $photoPath];
        }
        if($this->resume){
            $resumePath = $this->resume->store('files', 'public');
            $resumeArray = ['resume' => $resumePath];
        }
        if($this->offer_let){
            $offer_letPath = $this->offer_let->store('files', 'public');
            $offer_letArray = ['offer_let' => $offer_letPath];
        }
        if($this->join_let){
            $join_letPath = $this->join_let->store('files', 'public');
            $join_letArray = ['join_let' => $join_letPath];
        }
        if($this->contact_paper){
            $contact_paperPath = $this->contact_paper->store('files', 'public');
            $contact_paperArray = ['contact_paper' => $contact_paperPath];
        }
        if($this->id_proff){
            $id_proffPath = $this->id_proff->store('files', 'public');
            $id_proffArray = ['id_proff' => $id_proffPath];
        }
        if($this->other){
            $otherPath = $this->other->store('files', 'public');
            $otherArray = ['other' => $otherPath];
        }

        Employee::create(array_merge(
            $data,
            $photoArray ?? [],
            $resumeArray ?? [],
            $offer_letArray ?? [],
            $join_letArray ?? [],
            $contact_paperArray ?? [],
            $id_proffArray ?? [],
            $otherArray ?? [],
            $s ,
        ));


        session()->flash('success', 'Employee successfully Inserted.');
        return redirect('/employees');
    }

    public function render()
    {
        $client_id = auth()->user()->client_id ?? null;
        $departments = Department::where('client_id', $client_id)->get();
        $designations = [];

        if($this->department_id)
        {
            $dept = Department::find($this->department_id);
            $designations = $dept->designations()->get();
        }

        return view('livewire.employee.create', compact('departments', 'designations'));
    }
}
