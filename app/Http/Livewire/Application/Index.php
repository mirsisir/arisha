<?php

namespace App\Http\Livewire\Application;

use Livewire\Component;
use App\Models\Application;
use Livewire\WithPagination;

class Index extends Component
{
    public $start = '';
    public $end = '';
    public $search = '';


    protected $queryString = ['start', 'end', 'search'];

    public function mount()
    {
        $this->start = '';
        $this->end = '';
        $this->search = '';
    }

    public function destroy(Application $app)
    {
        $app->delete();
        session()->flash('danger', 'Application Successfully Deleted.');
    }

    public function render()
    {   
        $this->dispatchBrowserEvent('livewire:load');
        $client_id = auth()->user()->client_id;

        if($this->start && $this->end)
        {
            $app = Application::where('client_id', $client_id)
                            ->whereBetween('start', [$this->start, $this->end])->get();

            if($app){
                $applications = $app;
            }else{
                $applications = Application::where('client_id', $client_id)
                            ->whereBetween('end', [$this->start, $this->end])->get();
            }
        }
        else{
            $applications = Application::where('client_id', $client_id)->get();
        }

        return view('livewire.application.index', compact('applications'));
    }
}
