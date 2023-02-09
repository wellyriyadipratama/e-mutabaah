@extends('index')

@section('content')
<div class="section">
    <!-- Current balance & total transactions cards-->
    <div class="row vertical-modern-dashboard">
        <div class="col-xl-12">
            <div class="card animate fadeLeft">
                <div class="card-content">
                    <div class="modal-content">
                        @csrf
                        <div class="row">
                            <div class="input-field col s6">
                                <input placeholder="Nama Kelas" id="nama_kelas" type="text" name="nama_kelas" class="validate" disabled value="{{$dataKelas->nama_kelas}}">
                                <label for="nama_kelas" class="active">Nama Kelas</label>
                            </div>
                            <div class="input-field col s6">
                                <input placeholder="Waktu Belajar" id="waktu_belajar" type="text" name="waktu_belajar" class="validate" disabled value="{{$dataKelas->waktu_belajar}}">
                                <label for="waktu_belajar" class="active">Waktu Belajar</label>
                                <label>Waktu Belajar</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <label>Guru Kelas</label>
                                    <ol style="margin-top:5vh;">
                                        @foreach($dataGuru as $d)
                                        <li>{{$d->nama_guru}}</li>
                                        @endforeach
                                    </ol>
                            </div>
                            <div class="input-field col s6">
                                <input placeholder="Nama Santri" id="nama_santri" type="text" name="nama_santri" class="validate" disabled value="{{$dataSantri->nama_santri}}">
                                <label for="waktu_belajar" class="active">Nama Santri</label>
                                <label>Nama Santri</label>
                            </div>
                        </div>
                    </div>
                    <!-- Isi kontennya disini-->
                    <h5>Nilai Mutaba'ah</h5>
                    <div class="row">
                        <div class="col m12">
                            <form  action="{{route('simpan-mutabaah')}}" method="post" id="formNilai">
                                @csrf
                                <input type="hidden" name="guru_id" value="{{auth()->user()->id}}">
                                <input type="hidden" name="santri_id" value="{{$dataSantri->id}}">
                                <input type="hidden" name="kelas_id" value="{{$dataKelas->id}}">
                                <input type="hidden" name="semester_id" value="{{$dataKelas->tahun_ajaran_id}}">
                                <table class="striped bordered">
                                    <thead>
                                        <tr>
                                            <th>Kegiatan</th>
                                            <th>Halaman</th>
                                            <th>Baris</th>
                                            <th>Surat</th>
                                            <th>Ayat</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Tahsin</th>
                                            <th>
                                                <input type="number" name="tahsin_hal">
                                            </th>
                                            <th>
                                                <input type="number" name="tahsin_baris">
                                            </th>
                                            <th>
                                                <input type="text" name="tahsin_surat">
                                            </th>
                                            <th>
                                                <input type="text" name="tahsin_ayat">
                                            </th>
                                            <th>
                                                <input type="number" name="tahsin_nilai">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Tahfidz</th>
                                            <th>
                                                <input type="number" name="tahfizh_hal">
                                            </th>
                                            <th>
                                                <input type="number" name="tahfizh_baris">
                                            </th>
                                            <th>
                                                <input type="text" name="tahfizh_surat">
                                            </th>
                                            <th>
                                                <input type="text" name="tahfizh_ayat">
                                            </th>
                                            <th>
                                                <input type="number" name="tahfizh_nilai">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Talaqi Tahsin</th>
                                            <th>
                                                <input type="number" name="talaqi_tahsin_hal">
                                            </th>
                                            <th>
                                                <input type="number" name="talaqi_tahsin_baris">
                                            </th>
                                            <th>
                                                <input type="text" name="talaqi_tahsin_surat">
                                            </th>
                                            <th>
                                                <input type="text" name="talaqi_tahsin_ayat">
                                            </th>
                                            <th>
                                                <input type="number" name="talaqi_tahsin_nilai">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Talaqi Tahfidz</th>
                                            <th>
                                                <input type="number" name="talaqi_tahfizh_hal">
                                            </th>
                                            <th>
                                                <input type="number" name="talaqi_tahfizh_baris">
                                            </th>
                                            <th>
                                                <input type="text" name="talaqi_tahfizh_surat">
                                            </th>
                                            <th>
                                                <input type="text" name="talaqi_tahfizh_ayat">
                                            </th>
                                            <th>
                                                <input type="number" name="talaqi_tahfizh_nilai">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Tilawah Harian</th>
                                            <th>
                                                <input type="number" name="tilawah_harian_hal">
                                            </th>
                                            <th>
                                                <input type="number" name="tilawah_harian_baris">
                                            </th>
                                            <th>
                                                <input type="text" name="tilawah_harian_surat">
                                            </th>
                                            <th>
                                                <input type="text" name="tilawah_harian_ayat">
                                            </th>
                                            <th>
                                                <input type="number" name="tilawah_harian_nilai">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Murajaah</th>
                                            <th>
                                                <input type="number" name="murajaah_hal">
                                            </th>
                                            <th>
                                                <input type="number" name="murajaah_baris">
                                            </th>
                                            <th>
                                                <input type="text" name="murajaah_surat">
                                            </th>
                                            <th>
                                                <input type="text" name="murajaah_ayat">
                                            </th>
                                            <th>
                                                <input type="number" name="murajaah_nilai">
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="input-field col s12">
                                   <textarea  class="materialize-textarea" name="catatan_guru" ></textarea>
                                    <label for="catatan_guru" class="active">Catatan Guru</label>
                                    <label>Catatan Guru</label>
                                </div>
                                <div class="input-field col s12">
                                    <textarea  class="materialize-textarea" name="catatan_ortu" ></textarea>
                                     <label for="catatan_ortu" class="active">Catatan Orang Tua</label>
                                     <label>Catatan Orang Tua</label>
                                 </div>
                                <button  type="submit" class="btn waves-effect waves-light green darken-1">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

@endsection