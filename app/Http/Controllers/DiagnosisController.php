<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosis;
class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $this->param['getAllDiagnosis'] = Diagnosis::all();

            return view('doctor.pages.diagnosis.page-list-diagnosis', $this->param);
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
        try {
            return view('doctor.pages.diagnosis.page-add-diagnosis');
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
            'name' => 'required',
        ],
        [
            'required' => ':attribute harus diisi.',
        ],
        [
            'name' => 'Nama Jenis Obat',
        ]);
        try {
            $diagnosis = new Diagnosis();
            $diagnosis->name = $request->name;
            $diagnosis->save();

            return redirect('/back-doctor/diagnosis')->withStatus('Berhasil menambah data.');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->param['getDetailDiagnosis'] = Diagnosis::find($id);
        try {
            return view('doctor.pages.diagnosis.page-edit-diagnosis', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,
        [
            'name' => 'required',
        ],
        [
            'required' => ':attribute harus diisi.',
        ],
        [
            'name' => 'Nama Jenis Obat',
        ]);

        try {
            $diagnosis = Diagnosis::find($id);
            $diagnosis->name = $request->name;
            $diagnosis->save();
            return redirect('/back-doctor/diagnosis')->withStatus('Berhasil memperbarui data.');
        } catch(\Throwable $e){
            return redirect('/back-doctor/diagnosis')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/back-doctor/diagnosis')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Diagnosis::find($id)->delete();
            return redirect('/back-doctor/diagnosis')->withStatus('Berhasil menghapus data.');
        } catch(\Throwable $e){
            return redirect('/back-doctor/diagnosis')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/back-doctor/diagnosis')->withError($e->getMessage());
        }
    }
}
