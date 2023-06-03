<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DrugInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $this->param['getAllDrugIn'] = DB::select('select drug_ins.*, drugs.name AS drug_name FROM drug_ins JOIN drugs ON drug_ins.drug_id = drugs.id');

            return view('backend.pages.drugIn.page-list-drugIn', $this->param);
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
        $this->param['getAllDrug'] = DB::select('select * from drugs');
        try {
            return view('backend.pages.drugIn.page-add-drugIn', $this->param);
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
        $now = Carbon::now();
        $datetime = $now->toDateTimeString();
        $this->validate($request,
        [
            'amount' => 'required',
        ],
        [
            'required' => ':attribute harus diisi.',
        ],
        [
            'amount' => 'Kuntitas Obat',
        ]);
        try {
            DB::insert('INSERT INTO drug_ins (drug_id, date_in, amount, created_at, updated_at) VALUES (?,?,?,?,?)', [$request->drug_id, $request->date_in, $request->amount, $datetime, $datetime]);
            return redirect('/drugIn')->withStatus('Berhasil menambah data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $this->param['getAllDrug'] = DB::select('select * from drugs');
        $this->param['getDetailDrugIn'] = DB::select('select * from drug_ins where id = ?', [$id]);
        try {
            return view('backend.pages.drugIn.page-edit-drugIn', $this->param);
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
        $now = Carbon::now();
        $datetime = $now->toDateTimeString();
        $this->validate($request,
        [
            'amount' => 'required',
        ],
        [
            'required' => ':attribute harus diisi.',
        ],
        [
            'amount' => 'Kuntitas Obat',
        ]);
        try {
            DB::update('UPDATE drug_ins SET drug_id = ?, date_in = ?, amount = ?, updated_at =? WHERE id = ?', [$request->drug_id,$request->date_in,$request->amount, $datetime,$id,]);
            return redirect('/drugIn')->withStatus('Berhasil memperbarui data.');
        } catch(\Throwable $e){
            return redirect('/drugIn')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/drugIn')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::delete('DELETE FROM drug_ins WHERE id = ?', [$id]);
            return redirect('/drugIn')->withStatus('Berhasil menghapus data.');
        } catch(\Throwable $e){
            return redirect('/drugIn')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/drugIn')->withError($e->getMessage());
        }
    }
}
