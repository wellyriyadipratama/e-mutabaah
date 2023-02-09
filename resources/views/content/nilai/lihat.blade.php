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
                        <a class="btn waves-effect waves-light green darken-1 modal-trigger" href="{{route('tambah-nilai')}}">Tambah Nilai</a>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <table class="striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal Penilaian</th>
                                        <th>Jenis Penilaian</th>
                                        <th>Semester</th>
                                        <th>Surah</th>
                                        <th>Nama Santri</th>
                                        <th>Makhraj</th>
                                        <th>Mad</th>
                                        <th>Ghunnah</th>
                                        <th>Kelancaran</th>
                                        <th>Guru</th>
                                        <th>Nilai Akhir</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    @foreach ($dataNilai as $item)
                                    <tr>
                                        <td>{{date('d M Y',strtotime($item->created_at))}}</td>
                                        <td>{{$item->nilai_type}}</td>
                                        <td>{{$item->data_semester->tahun_ajaran}}</td>
                                        <td>{{$item->data_surat->nama_surat}}</td>
                                        <td>{{$item->data_santri->nama_santri}}</td>
                                        <td>{{$item->makhraj!=0?'-'.$item->makhraj : $item->makhraj}}</td>
                                        <td>{{$item->mad!=0?'-'.$item->mad : $item->mad}}</td>
                                        <td>{{$item->ghunnah!=0?'-'.$item->ghunnah : $item->ghunnah}}</td>
                                        <td>{{$item->kelancaran!=0?'-'.$item->kelancaran : $item->kelancaran}}</td>
                                        <td>{{$item->data_guru->nama_guru??''}}</td>
                                        <td>{{90-($item->makhraj+$item->mad+$item->ghunnah+$item->kelancaran)}}</td>
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