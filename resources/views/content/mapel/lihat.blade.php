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
                        <button onclick="add()" type="button" class="btn waves-effect waves-light green darken-1 modal-trigger" href="#modalMapel">Tambah Mapel</button>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <table class="striped">
                                <thead>
                                    <th>Mapel</th>
                                    <th>Jenis</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($dataMapel as $value)
                                    <tr>
                                        <td>{{$value->mapel}}</td>
                                        <td>{{$value->jenis}}</td>
                                        <td>
                                            <a href="#" class="btn-floating waves-effect waves-light amber darken-1" onclick="edit(this)" data-src="{{route('edit-mapel',[$value->id])}}"><i class="material-icons">create</i></a>
                                            <a href="#" class="btn-floating waves-effect waves-light red darken-1" onclick="deletedata(this)" data-src="{{route('delete-mapel',[$value->id])}}"><i class="material-icons">delete_forever</i></a>
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
<div id="modalMapel" class="modal modal-fixed-footer">
    <form action="{{route('simpan-mapel')}}" method="post" id="formMapel">
        <div class="modal-content">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Mata Pelajaran" id="mapel" type="text" name="mapel" class="validate" required>
                        <label for="mapel" class="active">Mata Pelajaran</label>
                    </div>
                </div> 
                <div class="row">
                    <div class="input-field col s12">
                        <select name="jenis" required>
                            <option value="" disabled selected>Pilih Jenis</option>
                            <option value="Iqra">Iqra'</option>
                            <option value="Kibar">Kibar</option>
                            <option value="Al-Quran">Al-Qur'an</option>
                            <option value="Materi Iman">Materi Iman</option>
                        </select>
                        <label>Predikat</label>
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
            $('#formMapel').attr('action','{{route('update-mapel')}}')
            $('<input id="id">').attr({
                        type: 'hidden',
                        name: 'id',
                        value:d.id
                    }).appendTo('#formMapel');
            $('input[name="mapel"]').val(d.mapel)
            $('select[name="jenis"]').val(d.jenis)
            $('#modalMapel').modal('open');
        })
    }
    function add()
    {
        $('#id').remove()
        $('#formMapel').attr('action','{{route('simpan-mapel')}}')
        $('#formMapel').trigger("reset")
    }
    function deletedata(e){
        if(confirm("Apakah Anda Ingin Menghapus Data Ini?")){
            window.location.href = $(e).data('src')
        }
    }
</script>
@endsection