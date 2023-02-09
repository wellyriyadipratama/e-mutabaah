<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruKelas extends Model
{
    use HasFactory;
    protected $table='guru_kelas';
    public $fillable=[
        'guru_id','kelas_id'
    ];

    public function dataKelas()
    {
        return $this->hasOne(Kelas::class,'id','kelas_id');
    }

    public function data_guru()
    {
        return $this->hasOne(Guru::class,'id','guru_id');
    }
}
