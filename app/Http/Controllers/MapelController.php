<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    public function lihat()
    {
        $dataMapel = Mapel::all();
        return view('content.mapel.lihat',compact('dataMapel'));
    }
    public function simpanMapel()
    {
        $this->mapel = new Mapel();
        $params = array_filter(request()->all(),function($key){
            return in_array($key,$this->mapel->fillable)!==false;
        },ARRAY_FILTER_USE_KEY);
    //    dd($params);
        $ins = Mapel::create($params);
        return redirect()->back()->with([
            "error"=> !$ins,
            "message"=>($ins?'Tambah Berhasil':'Tambah Gagal')
        ]);
    }

    public function editMapel($id)
    {
        return response()->json(Mapel::where(['id'=>$id])->first());
    }

    public function updateMapel()
    {
        if(request()->has('id')){
            $this->mapel = new Mapel();
            $params = array_filter(request()->all(),function($key){
                return in_array($key,$this->mapel->fillable)!==false;
            },ARRAY_FILTER_USE_KEY);
        //    dd($params);
            $upd = Mapel::where('id',request('id'))->update($params);
            return redirect()->back()->with([
                "error"=> !$upd,
                "message"=>($upd?'Update Berhasil':'Update Gagal')
            ]);
        }
        return redirect()->back(['error'=>true,'Id Tidak Ada']);
    }

    public function deleteMapel($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();
        return redirect()->back()->with([
            "error"=> !$mapel,
            "message"=>($mapel?'Data Telah Dihapus':'Data Gagal Dihapus')
        ]);
    }
}
