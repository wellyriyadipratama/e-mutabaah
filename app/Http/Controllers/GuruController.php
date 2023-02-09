<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use Hash;
use App\Models\User;

class GuruController extends Controller
{
    public function lihat()
    {
        $dataGuru = Guru::all();
        return view('content.guru.lihat',compact('dataGuru'));
    }


    public function simpanGuru()
    {
        $this->guru = new Guru();
        $params = array_filter(request()->all(),function($key){
            return in_array($key,$this->guru->fillable)!==false;
        },ARRAY_FILTER_USE_KEY);
        $ins = Guru::create($params);
        if($ins){
            User::create([
                'guru_id'=>$ins->id,
                'name'=>$params['nama_guru'],
                'email'=>request('email'),
                'email_verified_at'=>null,
                'password'=>Hash::make(request('password')),
                'remember_token'=>null,
            ]);
        }
        return redirect()->back()->with([
            "error"=> !$ins,
            "message"=>($ins?'Tambah Berhasil':'Tambah Gagal')
        ]);
    }


    public function editGuru($id)
    {
        return response()->json(Guru::with('dataUser')->where(['id'=>$id])->first());
    }


    public function updateGuru()
    {
        if(request()->has('id')){
            $this->guru = new Guru();
            $params = array_filter(request()->all(),function($key){
                return in_array($key,$this->guru->fillable)!==false;
            },ARRAY_FILTER_USE_KEY);
        //    dd($params);
            $upd = Guru::where('id',request('id'))->update($params);
            if($upd){
                if(User::where('guru_id',request('id'))->exists()){
                    $updParams = [
                        'name'=>$params['nama_guru'],
                        'email'=>request('email'),
                        'email_verified_at'=>null,
                        'remember_token'=>null,
                    ];
                    if(request('password')!=''){
                        $updParams['password']=Hash::make(request('password'));
                    }
                    User::where('guru_id',request('id'))->update($updParams);
                }else {
                    User::create([
                        'guru_id'=>request('id'),
                        'name'=>$params['nama_guru'],
                        'email'=>request('email'),
                        'email_verified_at'=>null,
                        'password'=>Hash::make(request('password')),
                        'remember_token'=>null,
                    ]);
                }
                
            }
            return redirect()->back()->with([
                "error"=> !$upd,
                "message"=>($upd?'Update Berhasil':'Update Gagal')
            ]);
        }
        return redirect()->back(['error'=>true,'Id Tidak Ada']);
    }


    public function deleteGuru($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        User::where('guru_id',$id)->delete();
        return redirect()->back()->with([
            "error"=> !$guru,
            "message"=>($guru?'Data Telah Dihapus':'Data Gagal Dihapus')
        ]);
    }
}
