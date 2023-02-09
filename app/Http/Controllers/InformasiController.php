<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;

class InformasiController extends Controller
{
    public function lihat()
    {
        $dataInformasi = informasi::all();
        return view('content.informasi.lihat',compact('dataInformasi'));
    }
    public function simpanInformasi()
    {
        $this->informasi = new Informasi();
        $params = array_filter(request()->all(),function($key){
            return in_array($key,$this->informasi->fillable)!==false;
        },ARRAY_FILTER_USE_KEY);
    //    dd($params);
        $ins = Informasi::create($params);
        return redirect()->back()->with([
            "error"=> !$ins,
            "message"=>($ins?'Tambah Berhasil':'Tambah Gagal')
        ]);
    }
    public function editInformasi($id)
    {
        return response()->json(Informasi::where(['id'=>$id])->first());
    }
    public function updateInformasi()
    {
        if(request()->has('id')){
            $this->informasi = new Informasi();
            $params = array_filter(request()->all(),function($key){
                return in_array($key,$this->informasi->fillable)!==false;
            },ARRAY_FILTER_USE_KEY);
        //    dd($params);
            $upd = Informasi::where('id',request('id'))->update($params);
            return redirect()->back()->with([
                "error"=> !$upd,
                "message"=>($upd?'Update Berhasil':'Update Gagal')
            ]);
        }
        return redirect()->back(['error'=>true,'Id Tidak Ada']);
    }
    public function deleteInformasi($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();
        return redirect()->back()->with([
            "error"=> !$informasi,
            "message"=>($informasi?'Data Telah Dihapus':'Data Gagal Dihapus')
        ]);
    }
}