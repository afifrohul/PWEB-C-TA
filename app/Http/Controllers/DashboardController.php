<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private $param;
    public function index(){
        try {
            $this->param['getCountDrug'] = DB::table('drugs')->count();
            $this->param['getCountDrugType'] = DB::table('types')->count();
            $this->param['getCountDrugOutAmount'] = DB::table('drug_outs')->sum('amount');
            $this->param['getCountDrugOutIncome'] = DB::table('drug_outs')->sum('total_price');

            $this->param['getDrugOutJan'] = DB::table('drug_outs')->whereMonth('date_out', '01')->sum('total_price');
            $this->param['getDrugOutFeb'] = DB::table('drug_outs')->whereMonth('date_out', '02')->sum('total_price');
            $this->param['getDrugOutMar'] = DB::table('drug_outs')->whereMonth('date_out', '03')->sum('total_price');
            $this->param['getDrugOutApr'] = DB::table('drug_outs')->whereMonth('date_out', '04')->sum('total_price');
            $this->param['getDrugOutMei'] = DB::table('drug_outs')->whereMonth('date_out', '05')->sum('total_price');
            $this->param['getDrugOutJun'] = DB::table('drug_outs')->whereMonth('date_out', '06')->sum('total_price');
            $this->param['getDrugOutJul'] = DB::table('drug_outs')->whereMonth('date_out', '07')->sum('total_price');
            $this->param['getDrugOutAug'] = DB::table('drug_outs')->whereMonth('date_out', '08')->sum('total_price');
            $this->param['getDrugOutSep'] = DB::table('drug_outs')->whereMonth('date_out', '09')->sum('total_price');
            $this->param['getDrugOutOkt'] = DB::table('drug_outs')->whereMonth('date_out', '10')->sum('total_price');
            $this->param['getDrugOutNov'] = DB::table('drug_outs')->whereMonth('date_out', '11')->sum('total_price');
            $this->param['getDrugOutDes'] = DB::table('drug_outs')->whereMonth('date_out', '12')->sum('total_price');

            return view('backend.pages.dashboard.dashboard', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
