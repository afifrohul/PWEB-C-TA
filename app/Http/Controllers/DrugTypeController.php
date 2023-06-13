<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Type;

class DrugTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $param;
    public function index()
    {
        try {
            $this->param['getAllDrugType'] = Type::all();

            return view('staff.pages.type.page-list-type', $this->param);
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
            return view('staff.pages.type.page-add-type');
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
            $type = new Type();
            $type->name = $request->name;
            $type->save();

            return redirect('/back-staff/type')->withStatus('Berhasil menambah data.');
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

        $this->param['getDetailType'] = Type::find($id);
        try {
            return view('staff.pages.type.page-edit-type', $this->param);
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
            $type = Type::find($id);
            $type->name = $request->name;
            $type->save();
            return redirect('/back-staff/type')->withStatus('Berhasil memperbarui data.');
        } catch(\Throwable $e){
            return redirect('/back-staff/type')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/back-staff/type')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Type::find($id)->delete();
            return redirect('/back-staff/type')->withStatus('Berhasil menghapus data.');
        } catch(\Throwable $e){
            return redirect('/back-staff/type')->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect('/back-staff/type')->withError($e->getMessage());
        }
    }
}
