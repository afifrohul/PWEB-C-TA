<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Drug;
use App\Models\DrugIn;

class DrugInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $this->param['getAllDrugIn'] = DrugIn::all();

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
        $this->param['getAllDrug'] = Drug::all();
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

            $drugIn = new DrugIn();
            $drugIn->drug_id = $request->drug_id;
            $drugIn->date_in = $request->date_in;
            $drugIn->amount = $request->amount;
            $drugIn->save();

            return redirect('/drugIn')->withStatus('Berhasil menambah data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $this->param['getAllDrug'] = Drug::all();
        $this->param['getDetailDrugIn'] = DrugIn::find($id);
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
            $drugIn = DrugIn::find($id);
            $drugIn->drug_id = $request->drug_id;
            $drugIn->date_in = $request->date_in;
            $drugIn->amount = $request->amount;
            $drugIn->save();
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
            DrugIn::find($id)->delete();
            return redirect('/drugIn')->withStatus('Berhasil menghapus data.');
        } catch(\Throwable $e){
            return redirect('/drugIn')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/drugIn')->withError($e->getMessage());
        }
    }
}
