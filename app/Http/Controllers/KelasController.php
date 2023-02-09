<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Santri;
use App\Models\Guru;
use App\Models\KelasDetail;
use App\Models\GuruKelas;
use App\Models\TahunAjaran;
use DB;

class KelasController extends Controller
{
    public function lihat()
    {
        $dataKelas = Kelas::all();
        $tahunAjaran = TahunAjaran::all();
        return view('content.kelas.lihat',compact('dataKelas','tahunAjaran'));
    }

    public function simpanKelas()
    {
        $this->kelas = new Kelas();
        $params = array_filter(request()->all(),function($key){
            return in_array($key,$this->kelas->fillable)!==false;
        },ARRAY_FILTER_USE_KEY);
    //    dd($params);
        $ins = Kelas::create($params);
        return redirect()->back()->with([
            "error"=> !$ins,
            "message"=>($ins?'Tambah Berhasil':'Tambah Gagal')
        ]);
    }

    public function editKelas($id)
    {
        return response()->json(Kelas::where(['id'=>$id])->first());
    }

    public function updateKelas()
    {
        if(request()->has('id')){
            $this->kelas = new Kelas();
            $params = array_filter(request()->all(),function($key){
                return in_array($key,$this->kelas->fillable)!==false;
            },ARRAY_FILTER_USE_KEY);
        //    dd($params);
            $upd = Kelas::where('id',request('id'))->update($params);
            return redirect()->back()->with([
                "error"=> !$upd,
                "message"=>($upd?'Update Berhasil':'Update Gagal')
            ]);
        }
        return redirect()->back(['error'=>true,'Id Tidak Ada']);
    }

    public function deleteKelas($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->back()->with([
            "error"=> !$kelas,
            "message"=>($kelas?'Data Telah Dihapus':'Data Gagal Dihapus')
        ]);
    }

    public function detailKelas($id)
    {
        $dataKelas = Kelas::where(['id'=>$id])->first();
        $santribelummemilikikelas = Santri::select('santri.*')
        ->leftJoin('kelas_detail','kelas_detail.santri_id','santri.id')->whereNull('kelas_detail.santri_id')->get();
        $dataSantri = Santri::with('data_kelas')->whereHas('data_kelas',function($q) use ($id){
            $q->where('kelas_id',$id);
        })->get();

        $dataGuru = Guru::with('dataKelas')->whereHas('dataKelas',function($q) use ($id){
            $q->where('kelas_id',$id);
        })->get();
        
        $gurubelummemilikikelas = Guru::select('guru.*')
        ->leftJoin('guru_kelas',function($q) use ($id){
            $q->on('guru_kelas.guru_id','guru.id');
            $q->on('guru_kelas.kelas_id',DB::raw($id));
        })->whereNull('guru_kelas.guru_id')->get();

        return view ('content.kelas.detail',compact('dataKelas','dataSantri','santribelummemilikikelas','dataGuru','gurubelummemilikikelas'));
    }

    public function simpanSantri()
    {
        $this->kelasDetail = new KelasDetail();
        $params = array_filter(request()->all(),function($key){
            return in_array($key,$this->kelasDetail->fillable)!==false;
        },ARRAY_FILTER_USE_KEY);
    //    dd($params);
        $ins = KelasDetail::create($params);
        return redirect()->back()->with([
            "error"=> !$ins,
            "message"=>($ins?'Tambah Santri Berhasil':'Tambah Santri Gagal')
        ]);
    }

    public function simpanGuru()
    {
        $this->guruKelas = new GuruKelas();
        $params = array_filter(request()->all(),function($key){
            return in_array($key,$this->guruKelas->fillable)!==false;
        },ARRAY_FILTER_USE_KEY);
    //    dd($params);
        $ins = GuruKelas::create($params);
        return redirect()->back()->with([
            "error"=> !$ins,
            "message"=>($ins?'Tambah Guru Berhasil':'Tambah Guru Gagal')
        ]);
    }

    public function deleteSantri($id)
    {
        $deletesantri = KelasDetail::where('santri_id',$id);
        $deletesantri->delete();
        return redirect()->back()->with([
            "error"=> !$deletesantri,
            "message"=>($deletesantri?'Data Telah Dihapus':'Data Gagal Dihapus')
        ]);
    }

    public function deleteGuru($id)
    {
        $deleteguru = GuruKelas::where('guru_id',$id);
        $deleteguru->delete();
        return redirect()->back()->with([
            "error"=> !$deleteguru,
            "message"=>($deleteguru?'Data Telah Dihapus':'Data Gagal Dihapus')
        ]);
    }

}
