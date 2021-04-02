<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ArishaInfo;
use Illuminate\Http\Request;
use Exception;

class ArishaInfosController extends Controller
{

    /**
     * Display a listing of the arisha infos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $arishaInfos = ArishaInfo::paginate(25);

        return view('arisha_infos.index', compact('arishaInfos'));
    }

    /**
     * Show the form for creating a new arisha info.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('arisha_infos.create');
    }

    /**
     * Store a new arisha info in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            ArishaInfo::create($data);

            return redirect()->route('arisha_infos.arisha_info.index')
                ->with('success_message', 'Arisha Info was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified arisha info.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $arishaInfo = ArishaInfo::findOrFail($id);

        return view('arisha_infos.show', compact('arishaInfo'));
    }

    /**
     * Show the form for editing the specified arisha info.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $arishaInfo = ArishaInfo::findOrFail($id);
        

        return view('arisha_infos.edit', compact('arishaInfo'));
    }

    /**
     * Update the specified arisha info in the storage.
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
            
            $arishaInfo = ArishaInfo::findOrFail($id);
            $arishaInfo->update($data);

            return redirect()->route('arisha_infos.arisha_info.index')
                ->with('success_message', 'Arisha Info was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified arisha info from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $arishaInfo = ArishaInfo::findOrFail($id);
            $arishaInfo->delete();

            return redirect()->route('arisha_infos.arisha_info.index')
                ->with('success_message', 'Arisha Info was successfully deleted.');
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
                'name' => 'string|min:1|max:255|nullable',
            'title' => 'required|nullable|string|min:1|max:255',
            'details' => 'required|nullable|string|min:1|max:1000', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
