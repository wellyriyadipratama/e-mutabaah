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
                        {{-- <a class="btn waves-effect waves-light green darken-1 modal-trigger" href="{{route('tambah-summary-nilai')}}">Tambah Nilai</a> --}}
                        <a class="btn waves-effect waves-light darken-1 modal-trigger" href="{{route('kalkulasi-summary-nilai')}}">Kalkulasi Nilai</a>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <table class="striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal Penilaian</th>
                                        <th>Nama Santri</th>
                                        <th>Kelas</th>
                                        <th>Semester</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    @foreach ($dataNilai as $item)
                                    <tr>
                                        <td>{{date('d M Y',strtotime($item->tanggal_pengambilan_nilai))}}</td>
                                        <td>{{$item->data_santri->nama_santri}}</td>
                                        <td>{{$item->data_kelas->nama_kelas}}</td>
                                        <td>{{$item->data_semester->tahun_ajaran}}</td>
                                        <td><span
                                            class="badge badge pill {{($item->nilai_iman==null || $item->nilai_doa==null || $item->nilai_hadist==null || $item->nilai_sirah == null?'':'green')}}"
                                            style="color:black !important;">{{($item->nilai_iman==null || $item->nilai_doa==null || $item->nilai_hadist==null || $item->nilai_sirah == null?'Nilai Belum Lengkap':'Nilai Lengkap')}}</span>
                                            
                                        </td>
                                            <td>
                                                <a href="#" class="btn-floating waves-effect waves-light green darken-1" onclick="detail(this)" data-src="{{route('detail-summary-nilai',[$item->id])}}"><i class="material-icons">dehaze</i></a>
                                                {{-- <a href="{{route('cetak-summary-nilai',[$item->id])}}" class="btn-floating waves-effect waves-light amber darken-1" data-src="{{route('cetak-summary-nilai',[$item->id])}}"><i class="material-icons">local_printshop</i></a> --}}
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
<div id="modalSummaryNilai" class="modal modal-fixed-footer">
    <form action="{{route('update-summary-nilai')}}" method="post" id="formSummaryNilai">
        <div class="modal-content">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input type="hidden" name="santri_id">
                        <input type="hidden" name="guru_id">
                        <input type="hidden" name="kelas_id">
                        <input type="hidden" name="semester_id">
                        <input readonly placeholder="Nama Santri" id="nama_santri" type="text" name="nama_santri" class="validate" required>
                        <label for="nama_santri" class="active">Nama Santri</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input readonly placeholder="Nama Guru" id="nama_guru" type="text" name="nama_guru" class="validate" required>
                        <label for="nama_guru" class="active">Nama Guru</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s3">
                        <input placeholder="Nilai Adab" id="nilai_iman" type="text" name="nilai_iman" class="validate" required>
                        <label for="nilai_iman" class="active">Nilai Adab</label>
                    </div>
                    <div class="input-field col s3">
                        <input placeholder="Nilai Doa" id="nilai_doa" type="text" name="nilai_doa" class="validate" required>
                        <label for="nilai_doa" class="active">Nilai Doa</label>
                    </div>
                    <div class="input-field col s3">
                        <input placeholder="Nilai Hadist" id="nilai_hadist" type="text" name="nilai_hadist" class="validate" required>
                        <label for="nilai_hadist" class="active">Nilai Hadist</label>
                    </div>
                    <div class="input-field col s3">
                        <input placeholder="Nilai Sirah" id="nilai_sirah" type="text" name="nilai_sirah" class="validate" required>
                        <label for="nilai_sirah" class="active">Nilai Sirah</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Keterangan" id="keterangan1" type="text" name="keterangan1" class="validate" required>
                        <label for="keterangan1" class="active">Keterangan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input readonly placeholder="Surat Tahsin" id="surat_tahsin" type="text" name="surat_tahsin" class="validate" required>
                        <label for="surat_tahsin" class="active">Surat Tahsin</label>
                    </div>
                    <div class="input-field col s6">
                        <input readonly placeholder="Nilai Tahsin" id="nilai_tahsin" type="text" name="nilai_tahsin" class="validate" required>
                        <label for="nilai_tahsin" class="active">Nilai Tahsin</label>
                    </div>
                    <div class="input-field col s6">
                        <input readonly placeholder="Surat Tahfizh" id="surat_tahfizh" type="text" name="surat_tahfizh" class="validate" required>
                        <label for="surat_tahfizh" class="active">Surat Tahfizh</label>
                    </div>
                    <div class="input-field col s6">
                        <input readonly placeholder="Nilai Tahfizh" id="nilai_tahfizh" type="text" name="nilai_tahfizh" class="validate" required>
                        <label for="nilai_tahfizh" class="active">Nilai Tahfizh</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Keterangan" id="keterangan2" type="text" name="keterangan2" class="validate" required>
                        <label for="keterangan2" class="active">Keterangan</label>
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
    function detail(e)
    {
        $.get($(e).data('src'),function(d){
            console.log(d)
            $('<input id="id">').attr({
                        type: 'hidden',
                        name: 'id',
                        value:d.id
                    }).appendTo('#formSummaryNilai');
            $('input[name="santri_id"]').val(d.santri_id)
            $('input[name="nama_santri"]').val(d.data_santri.nama_santri)
            $('input[name="nama_guru"]').val(d.data_guru.nama_guru)
            $('input[name="guru_id"]').val(d.guru_id)
            $('input[name="kelas_id"]').val(d.kelas_id)
            $('input[name="semester_id"]').val(d.semester_id)
            $('input[name="nilai_tahsin"]').val(d.nilai_tahsin)
            $('input[name="nilai_tahfizh"]').val(d.nilai_tahfizh)
            $('input[name="surat_tahsin"]').val(d.surat_tahsin)
            $('input[name="surat_tahfizh"]').val(d.surat_tahfizh)

            $('input[name="nilai_iman"]').val(d.nilai_iman)
            $('input[name="nilai_doa"]').val(d.nilai_doa)
            $('input[name="nilai_sirah"]').val(d.nilai_sirah)
            $('input[name="nilai_hadist"]').val(d.nilai_hadist)
            $('input[name="keterangan1"]').val(d.keterangan1)
            $('input[name="keterangan2"]').val(d.keterangan2)

            $('#modalSummaryNilai').modal('open');
        })
    }
</script>
@endsection