<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterNilai extends Model
{
    use HasFactory;
    protected $table = 'master_nilai';
    public $fillable = [
        'santri_id','guru_id','tanggal_pengambilan_nilai','kelas_id','semester_id','nilai_iman','nilai_doa','nilai_hadist','nilai_sirah','keterangan1','surat_tahsin','nilai_tahsin','surat_tahfizh','nilai_tahfizh','keterangan2'
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
