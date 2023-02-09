@extends('index')

@section('content')
<div class="section">
    <!-- Current balance & total transactions cards-->
    <div class="row vertical-modern-dashboard">
        <div class="col-xl-12">
            <div class="card animate fadeLeft">
                <div class="card-content">
                    <!-- Isi kontennya disini-->
                    <h5>Detail Kelas</h5>
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
                    </div>
                    <div class="modal-footer">
                        <a  href="#modalTambahSantri" class="btn waves-effect waves-light green darken-1 modal-trigger">Tambah Santri</a>
                    </div>
                    <div class="card animate fadeLeft">
                        <div class="card-content">
                            <div class="row">
                                <div class="col m12">
                                    <table class="striped">
                                        <thead>
                                            <th>Nama Santri</th>
                                            <th>Ttl</th>
                                            <th>Tingkat Pendidikan</th>
                                            <th>Nama Ayah</th>
                                            <th>Waktu Belajar</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach($dataSantri as $value)
                                            <tr>
                                                <td>{{$value->nama_santri}}</td>
                                                <td>{{$value->tempat_lahir}} {{$value->tanggal_lahir}}</td>
                                                <td>{{$value->tingkat_pendidikan}}</td>
                                                <td>{{$value->nama_ayah}}</td>
                                                <td>{{$value->waktu_belajar}}</td>
                                                <td>
                                                    <a href="#" class="btn-floating waves-effect waves-light red darken-1" onclick="deletedata(this)" data-src="{{route('delete-santri-kelas',[$value->id])}}"><i class="material-icons">delete_forever</i></a>                                     
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#modalTambahGuru" class="btn waves-effect waves-light green darken-1 modal-trigger">Tambah Guru</a>
                    </div>
                    <div class="card animate fadeLeft">
                        <div class="card-content">
                            <div class="row">
                                <div class="col m12">
                                    <table class="striped">
                                        <thead>
                                            <th>Nama Guru</th>
                                            <th>Ttl</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                            <th>Action</th>
                                        </thead>
                                        @foreach($dataGuru as $value)
                                        <tr>
                                            <td>{{$value->nama_guru}}</td>
                                            <td>{{$value->tempat_lahir}} {{$value->tanggal_lahir}}</td>
                                            <td>{{$value->alamat}}</td>
                                            <td>{{$value->nomor_telepon}}</td>
                                            <td>
                                                <a href="#" class="btn-floating waves-effect waves-light red darken-1" onclick="deletedata(this)" data-src="{{route('delete-guru-kelas',[$value->id])}}"><i class="material-icons">delete_forever</i></a>                                     
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End konten -->
                </div>
            </div>
       </div>
   </div>
</div>

<div id="modalTambahSantri" class="modal modal-fixed-footer">
    <form action="{{route('simpan-kelas')}}" method="post" id="formKelas">
        <div class="modal-content">
            <div class="card animate fadeLeft">
                <div class="card-content">
                    <div class="row">
                        <div class="col m12">
                            <table class="striped">
                                <thead>
                                    <th>Nama Santri</th>
                                    <th>Ttl</th>
                                    <th>Tingkat Pendidikan</th>
                                    <th>Nama Ayah</th>
                                    <th>Waktu Belajar</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($santribelummemilikikelas as $value)
                                <tr>
                                    <td>{{$value->nama_santri}}</td>
                                    <td>{{$value->tempat_lahir}} {{$value->tanggal_lahir}}</td>
                                    <td>{{$value->tingkat_pendidikan}}</td>
                                    <td>{{$value->nama_ayah}}</td>
                                    <td>{{$value->waktu_belajar}}</td>
                                    <td>
                                        <a href="{{route('simpan-santri-kelas')}}?santri_id={{$value->id}}&kelas_id={{$dataKelas->id}}" class="btn-floating waves-effect waves-light green darken-1" onclick="edit(this)"><i class="material-icons">person_add</i></a>                                     
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close btn waves-effect waves-light cyan">Tutup</a>
            </div>
    </form>        
</div>

<div id="modalTambahGuru" class="modal modal-fixed-footer">
    <form action="{{route('simpan-kelas')}}" method="post" id="formKelas">
        <div class="modal-content">
            <div class="card animate fadeLeft">
                <div class="card-content">
                    <div class="row">
                        <div class="col m12">
                            <table class="striped">
                                <thead>
                                    <th>Nama Guru</th>
                                    <th>Ttl</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($gurubelummemilikikelas as $value)
                                <tr>
                                    <td>{{$value->nama_guru}}</td>
                                    <td>{{$value->tempat_lahir}} {{$value->tanggal_lahir}}</td>
                                    <td>{{$value->alamat}}</td>
                                    <td>{{$value->nomor_telepon}}</td>
                                    <td>
                                        <a href="{{route('simpan-guru-kelas')}}?guru_id={{$value->id}}&kelas_id={{$dataKelas->id}}" class="btn-floating waves-effect waves-light green darken-1" onclick="edit(this)"><i class="material-icons">person_add</i></a>                                     
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close btn waves-effect waves-light cyan">Tutup</a>
            </div>
    </form>        
</div>

<script>

function deletedata(e){
        if(confirm("Apakah Anda Ingin Menghapus Data Ini?")){
            window.location.href = $(e).data('src')
        }
    }

</script>

@endsection