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
                        <button onclick="add()" type="button" class="btn waves-effect waves-light green darken-1 modal-trigger" href="#modalGuru">Tambah Guru</button>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <table class="striped">
                                <thead>
                                    <th>Nama</th>
                                    <th>TTL</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>
                                    <th>Tgl Bergabung</th>
                                    <th>Tgl Berhenti</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($dataGuru as $value)
                                    <tr>
                                        <td>{{$value->nama_guru}}</td>
                                        <td>{{$value->tempat_lahir}} {{$value->tanggal_lahir}}</td>
                                        <td>{{$value->alamat}}</td>
                                        <td>{{$value->nomor_telepon}}</td>
                                        <td>{{$value->tanggal_bergabung}}</td>
                                        <td>{{$value->tanggal_berhenti}}</td>
                                        <td>
                                            <a href="#" class="btn-floating waves-effect waves-light amber darken-1" onclick="edit(this)" data-src="{{route('edit-guru',[$value->id])}}"><i class="material-icons">create</i></a>
                                            <a href="#" class="btn-floating waves-effect waves-light red darken-1" onclick="deletedata(this)" data-src="{{route('delete-guru',[$value->id])}}"><i class="material-icons">delete_forever</i></a>
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
<div id="modalGuru" class="modal modal-fixed-footer">
    <form action="{{route('simpan-guru')}}" method="post" id="formGuru">
        <div class="modal-content">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Nama Guru" id="nama_guru" type="text" name="nama_guru" class="validate" required>
                        <label for="nama_guru" class="active">Nama Guru</label>
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
                        <input placeholder="Nomor Telepon" id="nomor_telepon" type="number" name="nomor_telepon" class="validate" required>
                        <label for="nomor_telepon" class="active">Nomor Telepon</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Tanggal Bergabung" id="tanggal_bergabung" type="date" name="tanggal_bergabung" class="validate" required>
                        <label for="tanggal_bergabung" class="active">Tanggal Bergabung</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Tanggal Berhenti" id="tanggal_berhenti" type="date" name="tanggal_berhenti">
                        <label for="tanggal_berhenti" class="active">Tanggal Berhenti</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Email" id="email" type="email" name="email" class="validate" required>
                        <label for="email" class="active">Email</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Password" id="password" type="password" name="password" required>
                        <label for="password" class="active">Password</label>
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
            $('#formGuru').attr('action','{{route('update-guru')}}')
            $('<input id="id">').attr({
                        type: 'hidden',
                        name: 'id',
                        value:d.id
                    }).appendTo('#formGuru');
            $('input[name="nama_guru"]').val(d.nama_guru)
            $('input[name="tempat_lahir"]').val(d.tempat_lahir)
            $('input[name="tanggal_lahir"]').val(d.tanggal_lahir)
            $('input[name="alamat"]').val(d.alamat)
            $('input[name="nomor_telepon"]').val(d.nomor_telepon)
            $('input[name="tanggal_bergabung"]').val(d.tanggal_bergabung)
            $('input[name="tanggal_berhenti"]').val(d.tanggal_berhenti)
            $('input[name="email"]').val((d.data_user!=null?d.data_user.email:''))
            $('input[name="password"]').attr('required',false)
            $('#modalGuru').modal('open');
        })
    }
    function add()
    {
        $('#id').remove()
        $('#formGuru').attr('action','{{route('simpan-guru')}}')
        $('input[name="password"]').attr('required',true)
        $('#formGuru').trigger("reset")
    }
    function deletedata(e){
        if(confirm("Apakah Anda Ingin Menghapus Data Ini?")){
            window.location.href = $(e).data('src')
        }
    }
</script>
@endsection