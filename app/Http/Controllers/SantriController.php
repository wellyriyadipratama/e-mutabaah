<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;

class SantriController extends Controller
{
    public function lihat()
    {
        $dataSantri = Santri::all();
        return view('content.santri.lihat',compact('dataSantri'));
    }
    
    public function simpanSantri()
    {
        $this->santri = new Santri();
        $params = array_filter(request()->all(),function($key){
            return in_array($key,$this->santri->fillable)!==false;
        },ARRAY_FILTER_USE_KEY);
        $ins = Santri::create($params);
        return redirect()->back()->with([
            "error"=> !$ins,
            "message"=>($ins?'Tambah Berhasil':'Tambah Gagal')
        ]);
    }
    public function editSantri($id)
    {
        return response()->json(Santri::where(['id'=>$id])->first());
    }

    public function updateSantri()
    {
        if(request()->has('id')){
            $this->santri = new Santri();
            $params = array_filter(request()->all(),function($key){
                return in_array($key,$this->santri->fillable)!==false;
            },ARRAY_FILTER_USE_KEY);
        //    dd($params);
            $upd = Santri::where('id',request('id'))->update($params);
            return redirect()->back()->with([
                "error"=> !$upd,
                "message"=>($upd?'Update Berhasil':'Update Gagal')
            ]);
        }
        return redirect()->back(['error'=>true,'Id Tidak Ada']);
    }

    public function deleteSantri($id)
    {
        $santri = Santri::findOrFail($id);
        $santri->delete();
        return redirect()->back()->with([
            "error"=> !$santri,
            "message"=>($santri?'Data Telah Dihapus':'Data Gagal Dihapus')
        ]);
    }
}
