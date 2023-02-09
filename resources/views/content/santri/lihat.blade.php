@extends('index')

@section('content')
<div class="section">
    <!-- Current balance & total transactions cards-->
    <div class="row vertical-modern-dashboard">
        <div class="col-xl-12">
            <div class="card animate fadeLeft">
                <div class="card-content">
                    <!-- Isi kontennya disini-->
                    <div class="row">
                        <button onclick="add()" type="button" class="btn waves-effect waves-light green darken-1 modal-trigger" href="#modalSantri">Tambah Santri</button>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <table class="striped">
                                <thead>
                                    <tr>
                                        <th>Nama Santri</th>
                                        <th>Jenis Kelamin</th>
                                        <th>TTL</th>
                                        <th>Alamat</th>
                                        <th>Tingkat Pendidikan</th>
                                        <th>Nama Ayah</th>
                                        <th>No Telp Ayah</th>
                                        <th>Nama Ibu</th>
                                        <th>No Telp Ibu</th>
                                        <th>Waktu Belajar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataSantri as $value)
                                    <tr>
                                        <td>{{$value->nama_santri}}</td>
                                        <td>{{$value->jenis_kelamin}}</td>
                                        <td>{{$value->tempat_lahir}} {{$value->tanggal_lahir}}</td>
                                        <td>{{$value->alamat}}</td>
                                        <td>{{$value->tingkat_pendidikan}}</td>
                                        <td>{{$value->nama_ayah}}</td>
                                        <td>{{$value->nomor_telepon_ayah}}</td>
                                        <td>{{$value->nama_ibu}}</td>
                                        <td>{{$value->nomor_telepon_ibu}}</td>
                                        <td>{{$value->waktu_belajar}}</td>
                                        <td>
                                            <a href="#" class="btn-floating waves-effect waves-light amber darken-1" onclick="edit(this)" data-src="{{route('edit-santri',[$value->id])}}"><i class="material-icons">create</i></a>
                                            <a href="#" class="btn-floating waves-effect waves-light red darken-1" onclick="deletedata(this)" data-src="{{route('delete-santri',[$value->id])}}"><i class="material-icons">delete_forever</i></a>
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
    </div>
</div>
<div id="modalSantri" class="modal modal-fixed-footer">
    <form action="{{route('simpan-santri')}}" method="post" id="formSantri">
        <div class="modal-content">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Nama Santri" id="nama_santri" type="text" name="nama_santri" class="validate" required>
                        <label for="nama_santri" class="active">Nama Santri</label>
                    </div>
                </div> 
                <div class="row">
                    <div class="input-field col s12">
                        <select name="jenis_kelamin" required>
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="Laki laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <label>Jenis Kelamin</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Tempat Lahir" id="tempat_lahir" type="text" name="tempat_lahir" class="validate" required>
                        <label for="tempat_lahir" class="active">Tempat Lahir</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Tanggal Lahir" id="tanggal_lahir" type="date" name="tanggal_lahir" class="validate" required>
                        <label for="tanggal_lahir" class="active">Tanggal Lahir</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Alamat" id="alamat" type="text" name="alamat" class="validate" required>
                        <label for="alamat" class="active">Alamat</label>
                    </div>
                </div> 
                <div class="row">
                    <div class="input-field col s12">
                        <select name="tingkat_pendidikan" required>
                            <option value="" disabled selected>Pilih Pendidikan</option>
                            <option value="SD SEDERAJAT">SD SEDERAJAT</option>
                            <option value="SMP SEDERAJAT">SMP SEDERAJAT</option>
                            <option value="SMA SEDERAJAT">SMA SEDERAJAT</option>
                        </select>
                        <label>Status</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Nama Ayah" id="nama_ayah" type="text" name="nama_ayah" class="validate" required>
                        <label for="nama_ayah" class="active">Nama Ayah</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Nomor Telepon Ayah" id="nomor_telepon_ayah" type="number" name="nomor_telepon_ayah" class="validate" required>
                        <label for="nomor_telepon_ayah" class="active">Nomor Telepon Ayah</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Nama Ibu" id="nama_ibu" type="text" name="nama_ibu" class="validate" required>
                        <label for="nama_ibu" class="active">Nama Ibu</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Nomor Telepon Ibu" id="nomor_telepon_ibu" type="number" name="nomor_telepon_ibu" class="validate" required>
                        <label for="nomor_telepon_ibu" class="active">Nomor Telepon Ibu</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select name="waktu_belajar" required>
                            <option value="" disabled selected>Pilih Waktu Belajar</option>
                            <option value="Pagi">Pagi Pukul 07.30 - 10.30 WIB</option>
                            <option value="Siang">Siang Pukul 14.00 - 17.00 WIB</option>
                        </select>
                        <label>Waktu Belajar</label>
                    </div>
                </div> 
        </div>
        <div class="modal-footer">
            <button  type="submit" class="btn waves-effect waves-light green darken-1">Simpan</button>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Tutup</a>
        </div>
    </form>
</div>
<script>
    function edit(e)
    {
        $.get($(e).data('src'),function(d){
            console.log(d)
            $('#formSantri').attr('action','{{route('update-santri')}}')
            $('<input id="id">').attr({
                        type: 'hidden',
                        name: 'id',
                        value:d.id
                    }).appendTo('#formSantri');
            $('input[name="nama_santri"]').val(d.nama_santri)
            $('input[name="jenis_kelamin"]').val(d.jenis_kelamin)
            $('input[name="tempat_lahir"]').val(d.tempat_lahir)
            $('input[name="tanggal_lahir"]').val(d.tanggal_lahir)
            $('input[name="alamat"]').val(d.alamat)
            $('select[name="tingkat_pendidikan"]').val(d.tingkat_pendidikan)
            $('input[name="nama_ayah"]').val(d.nama_ayah)
            $('input[name="nomor_telepon_ayah"]').val(d.nomor_telepon_ayah)
            $('input[name="nama_ibu"]').val(d.nama_ibu)
            $('input[name="nomor_telepon_ibu"]').val(d.nomor_telepon_ibu)
            $('select[name="waktu_belajar"]').val(d.waktu_belajar)
            $('#modalSantri').modal('open');
        })
    }
    function add()
    {
        $('#id').remove()
        $('#formSantri').attr('action','{{route('simpan-santri')}}')
        $('#formSantri').trigger("reset")
    }
    function deletedata(e){
        if(confirm("Apakah Anda Ingin Menghapus Data Ini?")){
            window.location.href = $(e).data('src')
        }
    }
</script>
@endsection