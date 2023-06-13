<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Drug;
use App\Models\Type;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $param;
    public function index()
    {
        try {
            $this->param['getAllDrug'] = Drug::all();

            return view('staff.pages.drug.page-list-drug', $this->param);
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
        $this->param['getAllType'] = Type::all();
        try {
            return view('staff.pages.drug.page-add-drug', $this->param);
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
            'description' => 'required',
            'price' => 'required'
        ],
        [
            'required' => ':attribute harus diisi.',
        ],
        [
            'name' => 'Nama Obat',
            'description' => 'Deskripsi Obat',
            'price' => 'Harga Obat',
        ]);
        try {
            $drug = new Drug();
            $drug->name = $request->name;
            $drug->description = $request->description;
            $drug->type_id = $request->type_id;
            $drug->price = $request->price;
            $drug->save();

            return redirect('/back-staff/drug')->withStatus('Berhasil menambah data.');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->param['getAllType'] = Type::all();
        $this->param['getDetailDrug'] = Drug::find($id);
        
        try {
            return view('staff.pages.drug.page-edit-drug', $this->param);
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
            'description' => 'required',
            'price' => 'required'
        ],
        [
            'required' => ':attribute harus diisi.',
        ],
        [
            'name' => 'Nama Obat',
            'description' => 'Deskripsi Obat',
            'price' => 'Harga Obat',
        ]);
        try {
            $drug = Drug::find($id);
            $drug->name = $request->name;
            $drug->description = $request->description;
            $drug->type_id = $request->type_id;
            $drug->price = $request->price;
            $drug->save();
            return redirect('/back-staff/drug')->withStatus('Berhasil memperbarui data.');
        } catch(\Throwable $e){
            return redirect('/back-staff/drug')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/back-staff/drug')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Drug::find($id)->delete();
            return redirect('/back-staff/drug')->withStatus('Berhasil menghapus data.');
        } catch(\Throwable $e){
            return redirect('/back-staff/drug')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/back-staff/drug')->withError($e->getMessage());
        }
    }
}
