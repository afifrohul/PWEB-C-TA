<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrugTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $param;
    public function index()
    {
        try {
            // $this->param['getAllDrugType'] = DB::select('select * from types');
            $this->param['getAllDrugType'] = DB::table('types')->get();

            return view('backend.pages.type.page-list-type', $this->param);
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
            return view('backend.pages.type.page-add-type');
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
            // DB::insert('INSERT INTO types (name) VALUES (?)', [$request->name]);
            DB::table('types')->insert(['name' => $request->name]);
            return redirect('/type')->withStatus('Berhasil menambah data.');
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

        // $this->param['getDetailType'] = DB::select('select * from types where id = ?', [$id]);
        $this->param['getDetailType'] = DB::table('types')->where('id', $id)->get();
        try {
            return view('backend.pages.type.page-edit-type', $this->param);
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
            // DB::update('UPDATE types SET name = ? WHERE id = ?', [$request->name,$id,]);
            DB::table('types')->where('id', $id)->update(['name' => $request->name]);
            return redirect('/type')->withStatus('Berhasil memperbarui data.');
        } catch(\Throwable $e){
            return redirect('/type')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/type')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // DB::delete('DELETE FROM types WHERE id = ?', [$id]);
            DB::table('types')->where('id', $id)->delete();
            return redirect('/type')->withStatus('Berhasil menghapus data.');
        } catch(\Throwable $e){
            return redirect('/type')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/type')->withError($e->getMessage());
        }
    }
}
