<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\Mutabaah;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\GuruKelas;
use DB;

class MutabaahController extends Controller
{

    public function index()
    {
        $dataMutabaah = Mutabaah::all();
        return view('content.mutabaah.lihat',compact('dataMutabaah'));
    }

    public function tambah()
    {
        $dataKelas = Kelas::all();
        return view('content.mutabaah.tambah',compact('dataKelas'));
    }

    public function lihatMutabaah($id)
    {
        $dataMutabaah = Mutabaah::all();
        $dataKelas = Kelas::where(['id'=>$id])->first();
        $dataSantri = Santri::with(['data_kelas','data_mutabaah'=>function($q){
            $q->where(DB::raw('CAST(created_at AS DATE)'),date('Y-m-d'));
        }])->whereHas('data_kelas',function($q) use ($id){
            $q->where('kelas_id',$id);
        })->get();
        // dd($dataSantri);
        $dataGuru = Guru::with('dataKelas')->whereHas('dataKelas',function($q) use ($id){
            $q->where('kelas_id',$id);
        })->get();       

        return view('content.mutabaah.detail',compact('dataMutabaah','dataSantri','dataKelas','dataGuru'));
    }

    public function nilaiMutabaah($kelas_id,$santri_id)
    {
        $dataKelas = Kelas::where(['id'=>$kelas_id])->first();
        $dataSantri = Santri::findOrFail($santri_id);
        $dataGuru = Guru::with('dataKelas')->whereHas('dataKelas',function($q) use ($kelas_id){
            $q->where('kelas_id',$kelas_id);
        })->get();
        return view('content.mutabaah.nilaiMutabaah',compact('dataSantri','dataKelas','dataGuru'));
    }
    public function simpanMutabaah()
    {
        $this->mutabaah = new Mutabaah();
        $params = array_filter(request()->all(),function($key){
            return in_array($key,$this->mutabaah->fillable)!==false;
        },ARRAY_FILTER_USE_KEY);
        $params['status']=1;
        $ins = Mutabaah::create($params);
        return redirect()->route('lihat-mutabaah',[$params['kelas_id']])->with([
            "error"=> !$ins,
            "message"=>($ins?'Tambah Berhasil':'Tambah Gagal')
        ]);
    }
    public function deleteMutabaah($id)
    {
        $mutabaah = Mutabaah::findOrFail($id);
        $mutabaah->delete();
        return redirect()->back()->with([
            "error"=> !$mutabaah,
            "message"=>($mutabaah?'Data Telah Dihapus':'Data Gagal Dihapus')
        ]);
    }

    public function editMutabaah($id)
    {
        return response()->json(Mutabaah::where(['id'=>$id])->first());
    }
}
