<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agency;
use App\Models\Profession;
use App\Models\AgencyProfession;
use Session;

class AgencyController extends Controller
{
    public function agency()
    {
        return view('agency');
    }

    public function agency_store(Request $request)
    {
		$data = $request->all();
        $model = new Agency;
        $model->fill($data);
        $model->save();
        Session::flash('success','Save');
        Session::flash('alert-class','alert-success');
        return redirect()->route('agency.create');
    }

    public function profession()
    {
    	return view('profession');
    }

    public function profession_store(Request $request)
    {
		$data = $request->all();
        $model = new Profession;
        $model->fill($data);
        $model->save();
        Session::flash('success','Save');
        Session::flash('alert-class','alert-success');
        return redirect()->route('profession.create');
    }

    public function agency_profession()
    {
    	$professions = Profession::all();
    	$agencies = Agency::all();
    	return view('agency_profession',[
           'professions'=>$professions,
           'agencies'=>$agencies
    	]);
    }

    public function agency_profession_store(Request $request)
    {
        if($request->profession_id != 'select_all')
        {
            $data = $request->all();
            $model = new AgencyProfession;
            $model->fill($data);
            $model->save();    
        }
        else
        {
            $professions = Profession::all();
            foreach($professions as $profession)
            {
                $data = $request->all();
                $data['profession_id'] = $profession->id;
                $model = new AgencyProfession;
                $model->fill($data);
                $model->save();    
            }
        }
        
        Session::flash('success','Save');
        Session::flash('alert-class','alert-success');
        return redirect()->route('agency.profession.create');
    }
}
