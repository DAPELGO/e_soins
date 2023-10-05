<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Valeur;
use App\Models\Structure;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::where('is_delete', FALSE)->get();
        return view("esoins.patients.index", compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $structure = Structure::where('id', Auth::user()->structure_id)->first();
        $structures = Structure::where('parent_id', $structure->parent_id)->get();
        return view('esoins.patients.create', compact('structures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'sexe_patient' => 'required',
        ]);

        $birth_date = $request->birth_date;
        $patient_date = NULL;
        if($birth_date == 'yes'){
            $patient_date = $request->birth_date_know;
        }else{
            $birth_date_unknow = $request->birth_date_unknow;
            $birth_date_item = $request->birth_date_item;
            if($birth_date_item == 'day'){
                $day = intval(date('d'))-intval($birth_date_unknow);
                $patient_date = date($day.'-m-Y');
            }else if($birth_date_item == 'month'){
                $month = intval(date('m'))-intval($birth_date_unknow);
                //dd($month);
                $patient_date = date('d-'.$month.'-Y');
            }else if($birth_date_item == 'year'){
                $year = intval(date('Y'))-intval($birth_date_unknow);
                $newformat = date('d-m-'.$year);
                $patient_date = date('d-m-'.$year);
            }
        }

        // dd($patient_date);

        Patient::create([
            'birth_date' => $patient_date,
            'name' => $request->name,
            'sexe' => $request->sexe_patient,
            'village' => $request->village_patient,
            'mother' => $request->mother_patient,
            // 'affiliation_number' => $request->affiliation_number,
            'phone_number' => $request->phone_number,
            // 'extrait_naissance' => $request->extrait_naissance,
            // 'cnib_father' => $request->cnib_father,
            // 'cnib_mother' => $request->cnib_mother,
            // 'gaspa_mother' => $request->gaspa_mother,
            'num_parent' => $request->num_telephone,
            'id_user_created' => Auth::user()->id,
        ]);
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
