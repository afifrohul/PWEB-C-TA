<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;
use App\Models\Drug;
use App\Models\User;
use App\Models\Diagnosis;

class InspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $this->param['getAllInspection'] = Inspection::all();

            return view('doctor.pages.inspection.page-list-inspection', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->param['getAllPatient'] = User::whereHas('roles', function($thisRole){
            $thisRole->where('name', 'patient');
        })->select('users.*')->get();
        $this->param['getAllDrug'] = Drug::all();
        $this->param['getAllDiagnosis'] = Diagnosis::all();
        try {
            return view('doctor.pages.inspection.page-add-inspection', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'patient_id' => 'required',
            'date_inspection' => 'required',
        ],
        [
            'required' => ':attribute harus diisi.',
        ],
        [
            'patient_id' => 'Nama Pasien',
            'date_inspection' => 'Tanggal Pemeriksaan'
        ]);

        try {
            $inspection = Inspection::create([
                'patient_id' => $request->patient_id,
                'doctor_id' => auth()->user()->id,
                'date_inspection' => $request->date_inspection,
                'note' => $request->note,
                'status'=> 'unlisted'
            ]);

            $inspection->diagnoses()->attach($request->diagnoses);
            $inspection->drugs()->attach($request->drugs);
            
            return redirect('/back-doctor/inspection')->withStatus('Berhasil menambah data.');

        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $this->param['getDetailInspection'] = Inspection::find($id);
            return view('doctor.pages.inspection.page-show-inspection', $this->param);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
