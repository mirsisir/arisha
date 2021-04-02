<?php

namespace App\Http\Controllers;

use App\Models\ArishaInfo;
use App\Models\ArishaInfoTranslation;
use Illuminate\Http\Request;

class TranslateController extends Controller
{
    public function create(){

        return view('translate.create_translate');
    }
    public function edit($id){
        $arisah_info = ArishaInfo::find($id);
        return view('translate.edit_translate',compact('arisah_info'));
    }

    public function store(Request $request) {

        $arishainfo = new ArishaInfo;
        $arishainfo->name = $request->input('en_name');
        $arishainfo->save();

        $translate= new ArishaInfoTranslation;
        $translate->arisha_info_id = $arishainfo->id ;
        $translate->locale = "en";
        $translate->title =  $request->input('en_title') ;
        $translate->details =  $request->input('en_full_text') ;
        $translate->save();

        $translate= new ArishaInfoTranslation;
        $translate->arisha_info_id = $arishainfo->id ;
        $translate->locale = "de";
        $translate->title =  $request->input('de_title') ;
        $translate->details =  $request->input('de_full_text') ;
        $translate->save();



        return "Save";
    }


    public function update(Request $request) {



        $translate= ArishaInfoTranslation::find($request->en_id);

        $translate->locale = "en";
        $translate->title =  $request->input('en_title') ;
        $translate->details =  $request->input('en_full_text') ;
        $translate->save();

        $translate= ArishaInfoTranslation::find($request->de_id);
        $translate->locale = "de";
        $translate->title =  $request->input('de_title') ;
        $translate->details =  $request->input('de_full_text') ;
        $translate->save();



        return redirect(route('index.translate'));
    }




    public function index(){
        $arisah_info = ArishaInfo::all();
      return view('translate.info_index',compact('arisah_info'));
    }

}
