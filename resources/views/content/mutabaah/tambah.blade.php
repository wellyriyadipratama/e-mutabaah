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
                        <div class="col m12">
                            <table class="striped">
                                <thead>
                                    <th>Nama Kelas</th>
                                    <th>Waktu Belajar</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($dataKelas as $value)
                                    <tr>
                                        <td>{{$value->nama_kelas}}</td>
                                        <td>{{$value->waktu_belajar}}</td>
                                        <td>
                                            <a href="{{route('lihat-mutabaah',[$value->id])}}" class="btn-floating waves-effect waves-light purple lightrn-1"  data-src=""><i class="material-icons">open_in_new</i></a>
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

@endsection