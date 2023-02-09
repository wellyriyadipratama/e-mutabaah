@extends('index')

@section('content')
    <div class="section">
        <!-- Current balance & total transactions cards-->
        <div class="row vertical-modern-dashboard">
            <div class="col-xl-12">
                <div class="card animate fadeLeft">
                    <div class="card-content">
                        <div class="modal-content">
                            @csrf
                            <div class="row">
                                <div class="input-field col s6">
                                    <input placeholder="Nama Kelas" id="nama_kelas" type="text" name="nama_kelas"
                                        class="validate" disabled value="{{ $dataKelas->nama_kelas }}">
                                    <label for="nama_kelas" class="active">Nama Kelas</label>
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="Waktu Belajar" id="waktu_belajar" type="text"
                                        name="waktu_belajar" class="validate" disabled
                                        value="{{ $dataKelas->waktu_belajar }}">
                                    <label for="waktu_belajar" class="active">Waktu Belajar</label>
                                    <label>Waktu Belajar</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <label>Guru Kelas</label>
                                    <ol style="margin-top:5vh;">
                                        @foreach ($dataGuru as $d)
                                            <li>{{ $d->nama_guru }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="Nama Santri" id="nama_santri" type="text" name="nama_santri"
                                        class="validate" disabled value="{{ $dataSantri->nama_santri }}">
                                    <label for="waktu_belajar" class="active">Nama Santri</label>
                                    <label>Nama Santri</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <select name="surat" required id="surat">
                                        <option value="" disabled selected>Pilh Surat</option>
                                        @foreach ($surat as $item)
                                            <option value="{{ $item->id }}">{{ $item->nomor_surat }} -
                                                {{ $item->nama_surat }}</option>
                                        @endforeach
                                    </select>
                                    <label>Pilh Surat</label>
                                </div>
                                <div class="input-field col s6">
                                    <button onclick="tambahRow()" type="button"
                                        class="btn waves-effect waves-light green darken-1">Tambah</button>
                                </div>
                            </div>
                        </div>
                        <div class="row tr-clone card d-none">
                            <div class="card-content">

                                <div class="col m4">
                                    <span class="nama_surat"></span>
                                    <input type="hidden" name="surat_id[]">
                                </div>
                                <div class="col m5">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <i class="material-icons btn-minus prefix"
                                                style="cursor: pointer;font-size : 3 rem" onclick="minusVal(this)">remove_circle_outline</i>
                                            <input placeholder="Makhraj" id="makhraj" type="text" name="makhraj[]"
                                                class="validate" required value="0">
                                            <i class="material-icons prefix btn-add" style="cursor: pointer;font-size : 3 rem" onclick="addVal(this)">add_circle_outline</i>
                                            <label for="makhraj" class="active">Makhraj</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <i class="material-icons btn-minus prefix"
                                                style="cursor: pointer;font-size : 3 rem" onclick="minusVal(this)">remove_circle_outline</i>
                                            <input placeholder="Mad" id="mad" type="text" name="mad[]"
                                                class="validate" required value="0">
                                                <i class="material-icons prefix btn-add" style="cursor: pointer;font-size : 3 rem" onclick="addVal(this)">add_circle_outline</i>
                                            <label for="mad" class="active">Mad</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <i class="material-icons btn-minus prefix"
                                                style="cursor: pointer;font-size : 3 rem" onclick="minusVal(this)">remove_circle_outline</i>
                                            <input placeholder="Ghunnah" id="ghunnah" type="text" name="ghunnah[]"
                                                class="validate" required value="0">
                                                <i class="material-icons prefix btn-add" style="cursor: pointer;font-size : 3 rem" onclick="addVal(this)">add_circle_outline</i>
                                            <label for="ghunnah" class="active">Ghunnah</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <i class="material-icons btn-minus prefix"
                                                style="cursor: pointer;font-size : 3 rem" onclick="minusVal(this)">remove_circle_outline</i>
                                            <input placeholder="Kelancaran" id="kelancaran" type="text"
                                                name="kelancaran[]" class="validate" required value="0">
                                                <i class="material-icons prefix btn-add" style="cursor: pointer;font-size : 3 rem" onclick="addVal(this)">add_circle_outline</i>
                                            <label for="kelancaran" class="active">Kelancaran</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col m3">
                                    <div class="input-field col s12">
                                        <input placeholder="Nilai Akhir" id="nilaiAkhir" type="text" name="nilai_akhir[]" class="validate"
                                            readonly value="90">
                                        <label for="nilaiAkhir" class="active">Nilai Akhir</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Isi kontennya disini-->
                        <h5>Nilai {{$nilaiType}}</h5>
                        <div class="row">
                            <div class="col m12">
                                <form action="{{ route('simpan-nilai') }}" method="post" id="formNilai">
                                    <input type="hidden" name="santri_id" value="{{ $dataSantri->id }}">
                                    <input type="hidden" name="guru_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="kelas_id" value="{{ $dataKelas->id }}">
                                    <input type="hidden" name="nilai_type" value="{{$nilaiType}}">
                                    @csrf
                                    <input type="hidden" name="semester_id" value="{{ $dataKelas->tahun_ajaran_id }}">

                                    <button type="submit"
                                        class="btn waves-effect waves-light green darken-1">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function tambahRow() {
            var clone = $('.tr-clone').clone()
            var id = $('select[name="surat"]').val();
            var nama_surat = $('#surat option:selected').text();
            clone.removeClass('tr-clone').removeClass('d-none')
            clone.find('input[name="surat_id[]"]').val(id);
            clone.find('.nama_surat').html(nama_surat);
            $('#formNilai').append(clone)
        }

        function deleteRow(e) {
            $(e).parent().parent().remove()
        }
        function minusVal(e)
        {
            valBefore = parseInt($(e).parent().find('input').val())
            if(valBefore!=0) $(e).parent().find('input').val(valBefore-1)
            nilaiAkhir = parseInt($(e).parent().parent().parent().parent().find('input[name="nilai_akhir[]"]').val())
            if(valBefore!=0) $(e).parent().find('input').val(valBefore-1)
            if(nilaiAkhir!=90) $(e).parent().parent().parent().parent().find('input[name="nilai_akhir[]"]').val(nilaiAkhir+1)
        }
        function addVal(e)
        {
            valBefore = parseInt($(e).parent().find('input').val())
            nilaiAkhir = parseInt($(e).parent().parent().parent().parent().find('input[name="nilai_akhir[]"]').val())
            $(e).parent().find('input').val(valBefore+1)
            if(nilaiAkhir!=0) $(e).parent().parent().parent().parent().find('input[name="nilai_akhir[]"]').val(nilaiAkhir-1)
        }
    </script>
@endsection
