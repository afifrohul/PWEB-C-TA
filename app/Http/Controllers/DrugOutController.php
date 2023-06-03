<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DrugOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $this->param['getAllDrugOut'] = DB::select('select drug_outs.*, drugs.name AS drug_name FROM drug_outs JOIN drugs ON drug_outs.drug_id = drugs.id');

            return view('backend.pages.drugOut.page-list-drugOut', $this->param);
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
            return view('backend.pages.drugOut.page-add-drugOut', $this->param);
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
            DB::insert('INSERT INTO drug_outs (drug_id, date_out, amount, total_price,created_at, updated_at) VALUES (?,?,?,?,?,?)', [$request->drug_id, $request->date_out, $request->amount, $total_price ,$datetime, $datetime]);
            return redirect('/drugOut')->withStatus('Berhasil menambah data.');
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
        $this->param['getAllDrug'] = DB::select('select * from drugs');
        $this->param['getDetailDrugOut'] = DB::select('select * from drug_outs where id = ?', [$id]);
        $this->param['getDetailDrugPrice'] = DB::select('select * from drugs where id = ?', [$id]);
        try {
            return view('backend.pages.drugOut.page-edit-drugOut', $this->param);
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
            DB::update('UPDATE drug_outs SET drug_id = ?, date_out = ?, amount = ?, total_price = ?,updated_at =? WHERE id = ?', [$request->drug_id,$request->date_out,$request->amount, $total_price , $datetime,$id,]);
            return redirect('/drugOut')->withStatus('Berhasil memperbarui data.');
        } catch(\Throwable $e){
            return redirect('/drugOut')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/drugOut')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::delete('DELETE FROM drug_outs WHERE id = ?', [$id]);
            return redirect('/drugOut')->withStatus('Berhasil menghapus data.');
        } catch(\Throwable $e){
            return redirect('/drugOut')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/drugOut')->withError($e->getMessage());
        }
    }
}
