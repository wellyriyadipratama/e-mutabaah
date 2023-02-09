<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutabaah extends Model
{
    use HasFactory;
    protected $table='mutabaah';
    public $fillable=[
        'santri_id','guru_id','status','kelas_id','semester_id','catatan_guru','catatan_ortu',
        'tahsin_hal','tahsin_baris','tahsin_surat','tahsin_ayat','tahsin_nilai',
        'tahfizh_hal','tahfizh_baris','tahfizh_surat','tahfizh_ayat','tahfizh_nilai',
        'talaqi_tahsin_hal','talaqi_tahsin_baris','talaqi_tahsin_surat','talaqi_tahsin_ayat','talaqi_tahsin_nilai',
        'talaqi_tahfizh_hal','talaqi_tahfizh_baris','talaqi_tahfizh_surat','talaqi_tahfizh_ayat','talaqi_tahfizh_nilai',
        'tilawah_harian_hal','tilawah_harian_baris','tilawah_harian_surat','tilawah_harian_ayat','tilawah_harian_nilai',
        'murajaah_hal','murajaah_baris','murajaah_surat','murajaah_ayat','murajaah_nilai',
    ];
    public function data_kelas()
    {
        return $this->hasOne(Kelas::class,'id','kelas_id');
    }
    public function data_santri()
    {
        return $this->hasOne(Santri::class,'id','santri_id');
    }
}
