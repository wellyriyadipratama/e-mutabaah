<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAjaran;
use App\Models\Surat;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Santri;
use App\Models\MasterNilai;
use DB;
use App\Models\Guru;
use Barryvdh\DomPDF\Facade\Pdf;

class NilaiController extends Controller
{
    public function lihat()
    {
        $dataNilai = Nilai::with(['data_guru','data_santri','data_kelas','data_semester','data_surat'])->get();
        return view('content.nilai.lihat',compact('dataNilai'));
    }
    public function tambah()
    {
        $dataKelas = new Kelas();
        if(session('userData')['level']=='guru'){
            $dataKelas = $dataKelas->whereHas('data_Guru',function($q){
                    $q->where('guru_id',session('userData')['id']);
                });
        }
        $dataKelas =  $dataKelas->get();
        return view('content.nilai.tambah',compact('dataKelas'));
    }
    public function lihatNilai($id)
    {
        $dataNilai = Nilai::all();
        $dataKelas = Kelas::where(['id'=>$id])->first();
        $dataSantri = Santri::with(['data_kelas','nilai_tahfizh'=>function($q) use($dataKelas){
            $q->where('semester_id',$dataKelas->tahun_ajaran_id);
        },'nilai_tahsin'=>function($q) use($dataKelas){
            $q->where('semester_id',$dataKelas->tahun_ajaran_id);
        }])->whereHas('data_kelas',function($q) use ($id){
            $q->where('kelas_id',$id);
        })->get();
        // dd($dataSantri);
        $dataGuru = Guru::with('dataKelas')->whereHas('dataKelas',function($q) use ($id){
            $q->where('kelas_id',$id);
        })->get();
        // dd($dataGuru);

        return view('content.nilai.detail',compact('dataNilai','dataSantri','dataKelas','dataGuru'));
    }
    public function nilaiTahfizh($kelas_id,$santri_id)
    {
        $dataKelas = Kelas::where(['id'=>$kelas_id])->first();
        $dataSantri = Santri::findOrFail($santri_id);
        $dataGuru = Guru::with('dataKelas')->whereHas('dataKelas',function($q) use ($kelas_id){
            $q->where('kelas_id',$kelas_id);
        })->get();
        $surat = Surat::all();
        $nilaiType = 'tahfizh';
        return view('content.nilai.nilai',compact('dataSantri','dataKelas','dataGuru','surat','nilaiType'));
    }
    public function nilaiTahsin($kelas_id,$santri_id)
    {
        $dataKelas = Kelas::where(['id'=>$kelas_id])->first();
        $dataSantri = Santri::findOrFail($santri_id);
        $dataGuru = Guru::with('dataKelas')->whereHas('dataKelas',function($q) use ($kelas_id){
            $q->where('kelas_id',$kelas_id);
        })->get();
        $surat = Surat::all();
        $nilaiType = 'tahsin';
        return view('content.nilai.nilai',compact('dataSantri','dataKelas','dataGuru','surat','nilaiType'));
    }
    public function simpanNilai()
    {
        // dd(request()->all());
        $this->nilai = new Nilai();
        for($i=0;$i<(count(request('surat_id')??[]));$i++){
            $params = [
                'guru_id'=>request('guru_id'),
                'santri_id'=>request('santri_id'),
                'kelas_id'=>request('kelas_id'),
                'semester_id'=>request('semester_id'),
                'nilai_type'=>request('nilai_type'),
                'surat_id'=>request('surat_id')[$i]??0,
                'makhraj'=>request('makhraj')[$i]??0,
                'mad'=>request('mad')[$i]??0,
                'ghunnah'=>request('ghunnah')[$i]??0,
                'kelancaran'=>request('kelancaran')[$i]??0,
                'nilai_akhir'=>request('nilai_akhir')[$i]??0,

            ];
            $ins = Nilai::create($params);
        }
        return redirect()->route('lihat-nilai',[$params['kelas_id']])->with([
            "error"=> !$ins,
            "message"=>($ins?'Tambah Berhasil':'Tambah Gagal')
        ]);
    }

    //Summary Nilai
    public function summaryNilai()
    {
        $dataNilai = MasterNilai::all();
        return view('content.summarynilai.lihat',compact('dataNilai'));
    }

    public function calculateNilai(){
        MasterNilai::truncate();
       $dataNilai = DB::select("
        SELECT guru_id,semester_id, santri_id, kelas_id, nilai_tahfizh/surat_tahfizh nilai_tahfizh,nilai_tahsin/surat_tahsin nilai_tahsin,tanggal_pengambilan_nilai
        FROM (
            SELECT a.guru_id,a.semester_id, a.santri_id,a.kelas_id,DATE(max(a.created_at)) tanggal_pengambilan_nilai,
            SUM(case when a.nilai_type='tahfizh' then a.nilai_akhir END ) nilai_tahfizh,
            SUM(case when a.nilai_type='tahsin' then a.nilai_akhir  END) nilai_tahsin,
            count(case when a.nilai_type='tahfizh' then a.surat_id END ) surat_tahfizh,
            count(case when a.nilai_type='tahsin' then a.surat_id  END) surat_tahsin
            FROM nilai a
            WHERE a.semester_id = 1
            GROUP BY a.semester_id, a.santri_id,a.kelas_id,a.guru_id
        )x");
        $this->masterNilai = new MasterNilai();
        $success = 0;
        foreach($dataNilai as $value ){
            $params = array_filter((Array)$value,function($key){
                return in_array($key,$this->masterNilai->fillable)!==false;
            },ARRAY_FILTER_USE_KEY);
            $ins = MasterNilai::create($params);
            Nilai::where(['kelas_id'=>$value->kelas_id,'santri_id'=>$value->santri_id,'semester_id'=>$value->semester_id])->update(['master_nilai_id'=>$ins->id]);
            if($ins) $success = $success +1 ;
        }
        return redirect()->back()->with([
            "error"=> false,
            "message"=>'Kalkulasi Selesai'
        ]);
    }
    public function detailSummaryNilai($id)
    {
        $dataNilai = MasterNIlai::with(['data_guru','data_santri'])->findOrFail($id);
        $dataSuratTahfizh = Nilai::with('data_surat')->where(['santri_id'=>$dataNilai->santri_id??'','kelas_id'=>$dataNilai->kelas_id??'','semester_id'=>$dataNilai->semester_id??'','nilai_type'=>'tahfizh'])->get();
        $dataSuratTahsin = Nilai::with('data_surat')->where(['santri_id'=>$dataNilai->santri_id??'','kelas_id'=>$dataNilai->kelas_id??'','semester_id'=>$dataNilai->semester_id??'','nilai_type'=>'tahsin'])->get();
        $suratTahfizh = [];
        $suratTahsin = [];
        foreach($dataSuratTahfizh as $value){
            array_push($suratTahfizh,$value->data_surat->nomor_surat.' - '.$value->data_surat->nama_surat);
        }
        foreach($dataSuratTahsin as $value){
            array_push($suratTahsin,$value->data_surat->nomor_surat.' - '.$value->data_surat->nama_surat);
        }
        $dataNilai['surat_tahfizh']=$suratTahfizh[0].' s.d '.$suratTahfizh[count($suratTahfizh)-1];
        $dataNilai['surat_tahsin']=$suratTahsin[0].' s.d '.$suratTahsin[count($suratTahsin)-1];
        return response()->json($dataNilai);
    }
    public function updateMasterNilai()
    {
        if(request()->has('id')){
            $this->masterNilai = new MasterNilai();
            $params = array_filter(request()->all(),function($key){
                return in_array($key,$this->masterNilai->fillable)!==false;
            },ARRAY_FILTER_USE_KEY);
        //    dd($params);
            $upd = MasterNilai::where('id',request('id'))->update($params);
            return redirect()->back()->with([
                "error"=> !$upd,
                "message"=>($upd?'Update Berhasil':'Update Gagal')
            ]);
        }
        return redirect()->back(['error'=>true,'Id Tidak Ada']);
    }
    public function cetakNilai($id)
    {
        $data = MasterNilai::findOrFail($id);
        $pdf = Pdf::loadView('content.summarynilai.print', compact('data'));
        return $pdf->stream();
    }
}
