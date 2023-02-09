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
                        <button onclick="add()" type="button" class="btn waves-effect waves-light green darken-1 modal-trigger" href="#modalInformasi">Tambah Informasi</button>
                    </div> 
                    <div class="row">
                        <div class="col m12">
                            <table class="striped">
                                <thead>
                                    <th>Judul</th>
                                    <th>Content</th>
                                    <th>Created-at</th>
                                    <th>Expired-at</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($dataInformasi as $value)
                                    <tr>
                                        <td>{{$value->judul}}</td>
                                        <td>{{$value->content}}</td>
                                        <td>{{$value->created_at}}</td>
                                        <td>{{$value->expired_at}}</td>
                                        <td>
                                            <a href="#" class="btn-floating waves-effect waves-light amber darken-1" onclick="edit(this)" data-src="{{route('edit-informasi',[$value->id])}}"><i class="material-icons">create</i></a>
                                            <a href="#" class="btn-floating waves-effect waves-light red darken-1" onclick="deletedata(this)" data-src="{{route('delete-informasi',[$value->id])}}"><i class="material-icons">delete_forever</i></a>
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
<div id="modalInformasi" class="modal modal-fixed-footer">
    <form action="{{route('simpan-informasi')}}" method="post" id="formInformasi">
        <div class="modal-content">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Judul" id="judul" type="text" name="judul" class="validate" required>
                        <label for="judul" class="active">Judul</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Content" id="content" type="text" name="content" class="validate" required>
                        <label for="content" class="active">Content</label>
                    </div>
                </div>  
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Expired-at" id="expired_at" type="date" name="expired_at" class="validate" required>
                        <label for="expired_at" class="active">Expired-at</label>
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
            $('#formInformasi').attr('action','{{route('update-informasi')}}')
            $('<input id="id">').attr({
                        type: 'hidden',
                        name: 'id',
                        value:d.id
                    }).appendTo('#formInformasi');
            $('input[name="judul"]').val(d.judul)
            $('input[name="content"]').val(d.content)
            $('input[name="expired_at"]').val(d.expired_at)
            $('#modalInformasi').modal('open');
        })
    }
    function add()
    {
        $('#id').remove()
         $('#formInformasi').attr('action','{{route('simpan-informasi')}}')
         $('#formInformasi').trigger("reset")
    }
    function deletedata(e){
        if(confirm("Apakah Anda Ingin Menghapus Data Ini?")){
            window.location.href = $(e).data('src')
        }
    }
</script>
@endsection