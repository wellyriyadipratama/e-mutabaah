<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    public $fillable = [
        'guru_id','santri_id','kelas_id','semester_id','makhraj','mad','ghunnah','kelancaran','surat_id','nilai_type','nilai_akhir'
    ];
    public function data_guru()
    {
        return $this->hasOne(Guru::class,'id','guru_id');
    }
    public function data_santri()
    {
        return $this->hasOne(Santri::class,'id','santri_id');
    }
    public function data_kelas()
    {
        return $this->hasOne(Kelas::class,'id','kelas_id');
    }
    public function data_semester()
    {
        return $this->hasOne(TahunAjaran::class,'id','semester_id');
    }
    public function data_surat()
    {
        return $this->hasOne(Surat::class,'id','surat_id');
    }
}
