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
                        <button onclick="add()" type="button" class="btn waves-effect waves-light green darken-1 modal-trigger" href="#modalKelas">Tambah Kelas</button>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <table class="striped">
                                <thead>
                                    <th>Nama Kelas</th>
                                    <th>TahunAjaran</th>
                                    <th>Waktu Belajar</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($dataKelas as $value)
                                    <tr>
                                        <td>{{$value->nama_kelas}}</td>
                                        <td>{{$value->dataTahunAjaran->tahun_ajaran??''}}</td>
                                        <td>{{$value->waktu_belajar}}</td>
                                        <td>
                                            <a href="#" class="btn-floating waves-effect waves-light amber darken-1" onclick="edit(this)" data-src="{{route('edit-kelas',[$value->id])}}"><i class="material-icons">create</i></a>
                                            <a href="#" class="btn-floating waves-effect waves-light red darken-1" onclick="deletedata(this)" data-src="{{route('delete-kelas',[$value->id])}}"><i class="material-icons">delete_forever</i></a>
                                            <a href="{{route('detail-kelas',[$value->id])}}" class="btn-floating waves-effect waves-light purple lightrn-1"  data-src=""><i class="material-icons">open_in_new</i></a>
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
<div id="modalKelas" class="modal modal-fixed-footer">
    <form action="{{route('simpan-kelas')}}" method="post" id="formKelas">
        <div class="modal-content">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Nama Kelas" id="nama_kelas" type="text" name="nama_kelas" class="validate" required>
                        <label for="nama_kelas" class="active">Nama Kelas</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select name="waktu_belajar" required>
                            <option value="" disabled selected>Pilih Waktu Belajar</option>
                            <option value="Pagi Pukul 07.30 - 10.30 WIB">Pagi Pukul 07.30 - 10.30 WIB</option>
                            <option value="Siang Pukul 14.00 - 17.00 WIB">Siang Pukul 14.00 - 17.00 WIB</option>
                        </select>
                        <label>Waktu Belajar</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select name="tahun_ajaran_id" required>
                            <option value="" disabled selected>Tahun Ajaran</option>
                            @foreach ($tahunAjaran as $item)
                                <option value="{{$item->id}}">{{$item->tahun_ajaran}}</option>
                            @endforeach
                        </select>
                        <label>Tahun Ajaran</label>
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
            $('#formKelas').attr('action','{{route('update-kelas')}}')
            $('<input id="id">').attr({
                        type: 'hidden',
                        name: 'id',
                        value:d.id
                    }).appendTo('#formKelas');
            $('input[name="nama_kelas"]').val(d.nama_kelas)
            $('select[name="waktu_belajar"]').val(d.waktu_belajar)
            $('#modalKelas').modal('open');
        })
    }
    function add()
    {
        $('#id').remove()
         $('#formKelas').attr('action','{{route('simpan-kelas')}}')
         $('#formKelas').trigger("reset")
    }
    function deletedata(e){
        if(confirm("Apakah Anda Ingin Menghapus Data Ini?")){
            window.location.href = $(e).data('src')
        }
    }
</script>
@endsection