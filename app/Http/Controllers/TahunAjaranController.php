<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAjaran;

class TahunAjaranController extends Controller
{
    public function lihat()
    {
        $dataTahunAjaran = TahunAjaran::all();
        return view('content.tahunajaran.lihat',compact('dataTahunAjaran'));
    }


    public function simpanTahunAjaran()
    {
        $this->tahunajaran = new TahunAjaran();
        $params = array_filter(request()->all(),function($key){
            return in_array($key,$this->tahunajaran->fillable)!==false;
        },ARRAY_FILTER_USE_KEY);
        $ins = TahunAjaran::create($params);
        return redirect()->back()->with([
            "error"=> !$ins,
            "message"=>($ins?'Tambah Berhasil':'Tambah Gagal')
        ]);
    }


    public function editTahunAjaran($id)
    {
        return response()->json(TahunAjaran::where(['id'=>$id])->first());
    }


    public function updateTahunAjaran()
    {
        if(request()->has('id')){
            $this->tahunajaran = new TahunAjaran();
            $params = array_filter(request()->all(),function($key){
                return in_array($key,$this->tahunajaran->fillable)!==false;
            },ARRAY_FILTER_USE_KEY);
        //    dd($params);
            $upd = TahunAjaran::where('id',request('id'))->update($params);
            return redirect()->back()->with([
                "error"=> !$upd,
                "message"=>($upd?'Update Berhasil':'Update Gagal')
            ]);
        }
        return redirect()->back(['error'=>true,'Id Tidak Ada']);
    }


    public function deleteTahunAjaran($id)
    {
        $tahunajaran = TahunAjaran::findOrFail($id);
        $tahunajaran->delete();
        User::where('tahunajaran_id',$id)->delete();
        return redirect()->back()->with([
            "error"=> !$tahunajaran,
            "message"=>($tahunajaran?'Data Telah Dihapus':'Data Gagal Dihapus')
        ]);
    }
}
