<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table='guru';
    public $fillable=[
        'nama_guru','tempat_lahir','tanggal_lahir','alamat','nomor_telepon','tanggal_bergabung','tanggal_berhenti'
    ];

    public function dataKelas()
    {
        return $this->hasOne(GuruKelas::class,'guru_id','id');
    }
    public function dataUser()
    {
        return $this->hasOne(User::class,'guru_id','id');
    }
}
