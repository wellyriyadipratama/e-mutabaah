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
                        <button onclick="add()" type="button" class="btn waves-effect waves-light green darken-1 modal-trigger" href="#modalTahunAjaran">Tambah Tahun Ajaran</button>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <table class="striped">
                                <thead>
                                    <th>No</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($dataTahunAjaran as $value)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$value->tahun_ajaran}}</td>
                                        <td>
                                            <a href="#" class="btn-floating waves-effect waves-light amber darken-1" onclick="edit(this)" data-src="{{route('edit-tahunajaran',[$value->id])}}"><i class="material-icons">create</i></a>
                                            <a href="#" class="btn-floating waves-effect waves-light red darken-1" onclick="deletedata(this)" data-src="{{route('delete-tahunajaran',[$value->id])}}"><i class="material-icons">delete_forever</i></a>
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
<div id="modalTahunAjaran" class="modal modal-fixed-footer">
    <form action="{{route('simpan-tahunajaran')}}" method="post" id="formTahunAjaran">
        <div class="modal-content">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Tahun Ajaran" id="tahun_ajaran" type="text" name="tahun_ajaran" class="validate" required>
                        <label for="tahun_ajaran" class="active">Tahun Ajaran</label>
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
            $('#formTahunAjaran').attr('action','{{route('update-tahunajaran')}}')
            $('<input id="id">').attr({
                        type: 'hidden',
                        name: 'id',
                        value:d.id
                    }).appendTo('#formTahunAjaran');
            $('input[name="nama_tahunajaran"]').val(d.nama_tahunajaran)
            $('input[name="tempat_lahir"]').val(d.tempat_lahir)
            $('input[name="tanggal_lahir"]').val(d.tanggal_lahir)
            $('input[name="alamat"]').val(d.alamat)
            $('input[name="nomor_telepon"]').val(d.nomor_telepon)
            $('input[name="tanggal_bergabung"]').val(d.tanggal_bergabung)
            $('input[name="tanggal_berhenti"]').val(d.tanggal_berhenti)
            $('#modalTahunAjaran').modal('open');
        })
    }
    function add()
    {
        $('#id').remove()
        $('#formTahunAjaran').attr('action','{{route('simpan-tahunajaran')}}')
        $('#formTahunAjaran').trigger("reset")
    }
    function deletedata(e){
        if(confirm("Apakah Anda Ingin Menghapus Data Ini?")){
            window.location.href = $(e).data('src')
        }
    }
</script>
@endsection