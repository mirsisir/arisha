<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Service;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class CategoryComponent extends Component
{
    public $charge,$name ,$category , $all_category, $all_service;
    public $update = false;
    public $hourly_service = true;
    public $employees = [];
    public $all_employee;
    public $basic,$km,$stopover,$waiting,$helper,$hourly=true,$square_meter,$details;



    public function mount(){
        $this->all_category = Category::all();
        $this->all_employee = Employee::all();
    }

//    public function updatedhourly(){
//
////        dd('called');
//    }

    public function create(){
//        dd($this->employees);

        $validatedData = $this->validate([
            'category' => 'required',
            'name'=>'required',
//            'charge'=>'required',

//            'charge'=>'required_if:category,Cleaning|',

            'basic'=>'required_if:hourly,false',
            'km'=>'required_if:hourly,false',
            'stopover'=>'required_if:hourly,false',
            'helper'=>'required_if:hourly,false',
            'waiting'=>'required_if:hourly,false',


            'square_meter'=>'required_if:category,Construction',


            'details'=>'required',

        ]);

        $user = Service::updateOrCreate(
            ['name' =>  $this->name],
            ['category' => $this->category ,
                'charge' => $this->charge,
                'employee' => $this->employees,

                'basic_price' => $this->basic,
                'km_price' => $this->km,
                'stop_over_price' => $this->stopover,
                'waiting_price' => $this->waiting,
                'helpers' => $this->helper,

                'SPM' => $this->square_meter,


                'details' => $this->details,


            ]
        );

        if ($this->category=="Construction"){
            $user->hourly = 0;
            $user->save();
        }
        else{
            $user->hourly = $this->hourly;
            $user->save();

        };

        Session::flash('message','Service Added!');

        $this->reset(['category','name','charge','employees','all_employee','helper','waiting','stopover','km','basic','square_meter','details']);

    }

    public function edit($s_id){
        $this->reset(['category','name','charge','employees','all_employee']);


        $this->update = true;
        $service = Service::find($s_id);


        $this->category = $service->category;
        $this->name = $service->name;
        $this->charge = $service->charge;
        $this->details = $service->details;
        $this->square_meter = $service->SPM;
        $this->hourly = $service->hourly;

        $this->basic = $service->basic_price;
        $this->basic = $service->basic_price;
        $this->km = $service->km_price;
        $this->stopover = $service->stop_over_price;
        $this->waiting = $service->waiting_price;
        $this->helper = $service->helpers;


//        $this->employees =  $service->employee;
//        $this->all_employee = Employee::all();
////        $this->render();

    }

    public function render()
    {
        $this->all_service = Service::all();
        return view('livewire.category-component')->layout('layouts.admin.base');
    }
}
