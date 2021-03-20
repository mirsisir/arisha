<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sisir;
use Illuminate\Http\Request;
use Exception;

class SisirsController extends Controller
{

    /**
     * Display a listing of the sisirs.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $sisirs = Sisir::with('category')->paginate(25);

        return view('sisirs.index', compact('sisirs'));
    }

    /**
     * Show the form for creating a new sisir.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();
        
        return view('sisirs.create', compact('categories'));
    }

    /**
     * Store a new sisir in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Sisir::create($data);

            return redirect()->route('sisirs.sisir.index')
                ->with('success_message', 'Sisir was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified sisir.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $sisir = Sisir::with('category')->findOrFail($id);

        return view('sisirs.show', compact('sisir'));
    }

    /**
     * Show the form for editing the specified sisir.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $sisir = Sisir::findOrFail($id);
        $categories = Category::pluck('name','id')->all();

        return view('sisirs.edit', compact('sisir','categories'));
    }

    /**
     * Update the specified sisir in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $sisir = Sisir::findOrFail($id);
            $sisir->update($data);

            return redirect()->route('sisirs.sisir.index')
                ->with('success_message', 'Sisir was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified sisir from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $sisir = Sisir::findOrFail($id);
            $sisir->delete();

            return redirect()->route('sisirs.sisir.index')
                ->with('success_message', 'Sisir was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'name' => 'string|min:1|max:255|required|nullable',
            'charge' => 'required|nullable|numeric',
            'category_id' => 'nullable',
            'employee_charge' => 'nullable|numeric',
            'hourly' => 'nullable|boolean',
            'basic_price' => 'nullable|numeric',
            'km_price' => 'nullable|numeric',
            'stop_over_price' => 'string|min:1|nullable|numeric',
            'waiting_price' => 'nullable|numeric',
            'helpers' => 'nullable|numeric',
            'details' => 'nullable|string|min:0|max:1000',
            'SPM' => 'nullable|numeric', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
