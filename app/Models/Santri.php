<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;
    protected $table='santri';
    public $fillable=[
        'nama_santri','jenis_kelamin','tempat_lahir','tanggal_lahir','alamat','tingkat_pendidikan','nama_ayah','nomor_telepon_ayah','nama_ibu','nomor_telepon_ibu','waktu_belajar'
    ];

    public function data_kelas()
    {
        return $this->hasOne(KelasDetail::class,'santri_id','id');
    }

    public function belum_punya_kelas()
    {
        return $this->hasMany(KelasDetail::class,'santri_id','id');
    }
    public function data_mutabaah()
    {
        return $this->hasMany(Mutabaah::class,'santri_id','id');
    }
    public function data_nilai()
    {
        return $this->hasMany(Nilai::class,'santri_id','id');
    }
    public function nilai_tahfizh()
    {
        return $this->hasMany(Nilai::class,'santri_id','id')->where('nilai_type','tahfizh');
    }
    public function nilai_tahsin()
    {
        return $this->hasMany(Nilai::class,'santri_id','id')->where('nilai_type','tahsin');
    }
}
