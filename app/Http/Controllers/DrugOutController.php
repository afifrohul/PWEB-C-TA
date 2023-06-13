<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Drug;
use App\Models\DrugOut;

class DrugOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $this->param['getAllDrugOut'] = DrugOut::all();

            return view('staff.pages.drugOut.page-list-drugOut', $this->param);
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
            return view('staff.pages.drugOut.page-add-drugOut', $this->param);
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
            $getPrice = DB::select('select price from drugs where id = ?', [$request->drug_id]);
            $total_price = $request->amount * $getPrice[0]->price;

            $drugOut = new DrugOut();
            $drugOut->drug_id = $request->drug_id;
            $drugOut->date_out = $request->date_out;
            $drugOut->amount = $request->amount;
            $drugOut->total_price = $total_price;
            $drugOut->save();



            return redirect('/back-staff/drugOut')->withStatus('Berhasil menambah data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->param['getAllDrug'] = Drug::all();
        $this->param['getDetailDrugOut'] = DrugOut::find($id);
        try {
            return view('staff.pages.drugOut.page-edit-drugOut', $this->param);
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
            $getPrice = DB::select('select price from drugs where id = ?', [$request->drug_id]);
            $total_price = $request->amount * $getPrice[0]->price;

            $drugOut = DrugOut::find($id);
            $drugOut->drug_id = $request->drug_id;
            $drugOut->date_out = $request->date_out;
            $drugOut->amount = $request->amount;
            $drugOut->total_price = $total_price;
            $drugOut->save();
            return redirect('/back-staff/drugOut')->withStatus('Berhasil memperbarui data.');
        } catch(\Throwable $e){
            return redirect('/back-staff/drugOut')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/back-staff/drugOut')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DrugOut::find($id)->delete();
            return redirect('/back-staff/drugOut')->withStatus('Berhasil menghapus data.');
        } catch(\Throwable $e){
            return redirect('/back-staff/drugOut')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/back-staff/drugOut')->withError($e->getMessage());
        }
    }
}
