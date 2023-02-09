@extends('index')

@section('content')
<div class="section">
    <!-- Current balance & total transactions cards-->
    <div class="row vertical-modern-dashboard">
        <div class="col-xl-12">
            <div class="card animate fadeLeft">
                <div class="card-content">
                    <!-- Isi kontennya disini-->
                    <h5>Mutaba'ah</h5>
                    <div class="row">
                        <a onclick="add()" type="button" class="btn waves-effect waves-light green darken-1 modal-trigger" href="{{route('tambah-mutabaah')}}">Tambah Mutabaah</a>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <table class="striped">
                                <thead>
                                    <th>Nama Santri</th>
                                    <th>Nama Kelas</th>
                                    <th>Waktu Belajar</th>
                                    <th>Tanggal Mutabaah</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($dataMutabaah as $value)
                                    <tr>
                                        <td>{{$value->data_santri->nama_santri}}</td>
                                        <td>{{$value->data_kelas->nama_kelas}}</td>
                                        <td>{{$value->data_kelas->waktu_belajar}}</td>
                                        <td>{{date('d M Y',strtotime($value->created_at))}}</td>
                                        <td>
                                            <a href="#" class="btn-floating waves-effect waves-light amber darken-1" data-src="{{route('edit-kelas',[$value->id])}}"><i class="material-icons">create</i></a>
                                            <a href="#" class="btn-floating waves-effect waves-light red darken-1" onclick="deletedata(this)" data-src="{{route('delete-mutabaah',[$value->id])}}"><i class="material-icons">delete_forever</i></a>
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
<script>
    function deletedata(e){
        if(confirm("Apakah Anda Ingin Menghapus Data Ini?")){
            window.location.href = $(e).data('src')
        }
    }
</script>
@endsection