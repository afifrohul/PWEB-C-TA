<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $param;
    public function index()
    {
        try {
            $this->param['getAllDrug'] = DB::select('select drugs.*, types.name AS type_name FROM drugs JOIN types ON drugs.type_id = types.id');

            return view('backend.pages.drug.page-list-drug', $this->param);
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
        $this->param['getAllType'] = DB::select('select * from types');
        try {
            return view('backend.pages.drug.page-add-drug', $this->param);
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
            DB::insert('INSERT INTO drugs (name, description, type_id, price) VALUES (?,?,?,?)', [$request->name, $request->description, $request->type_id, $request->price]);
            return redirect('/drug')->withStatus('Berhasil menambah data.');
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
        $this->param['getAllType'] = DB::select('select * from types');
        $this->param['getDetailDrug'] = DB::select('select * from drugs where id = ?', [$id]);
        
        try {
            return view('backend.pages.drug.page-edit-drug', $this->param);
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
            DB::update('UPDATE drugs SET name = ?, description = ?, type_id = ?, price =? WHERE id = ?', [$request->name,$request->description,$request->type_id,$request->price,$id,]);
            return redirect('/drug')->withStatus('Berhasil memperbarui data.');
        } catch(\Throwable $e){
            return redirect('/drug')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/drug')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::delete('DELETE FROM drugs WHERE id = ?', [$id]);
            return redirect('/drug')->withStatus('Berhasil menghapus data.');
        } catch(\Throwable $e){
            return redirect('/drug')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/drug')->withError($e->getMessage());
        }
    }
}
