<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table='kelas';
    public $fillable=[
        'nama_kelas','waktu_belajar','tahun_ajaran_id'
    ];

    public function data_Guru()
    {
        return $this->hasMany(GuruKelas::class,'kelas_id','id');
    }
    public function dataTahunAjaran()
    {
        return $this->hasOne(TahunAjaran::class,'id','tahun_ajaran_id');
    }
}
