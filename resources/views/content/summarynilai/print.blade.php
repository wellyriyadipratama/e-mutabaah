<html>
    <head>
        <title>Raport</title>
    </head>
    <body>
        <table width="100%">
            <tr>
                <td colspan="4">
                    RAPOR AKHIR SEMESTER GENAP<br>
                    TAHUN AJARAN {{strtoupper($data->data_semester->tahun_ajaran)}}
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    nama : {{$data->data_santri->nama_santri}}
                </td>
            </tr>
            <tr>
                <th>NO</th>
                <th>Aspek Penilaian</th>
                <th>Aspek Nilai</th>
                <th>Aspek Keterangan</th>
            </tr>
            <tr>
                <td rowspan="5">1</td>
                <td colspan="3">
                    Materi Iman
                </td>
            </tr>
            <tr>
                <td>Adab</td>
                <td>{{$data->nilai_iman}}</td>
                <td></td>
            </tr>
            <tr>
                <td>Doa</td>
                <td>{{$data->nilai_doa}}</td>
                <td></td>
            </tr>
            <tr>
                <td>Hadist</td>
                <td>{{$data->nilai_hadist}}</td>
                <td></td>
            </tr>
            <tr>
                <td>Sirah</td>
                <td>{{$data->nilai_sirah}}</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">

                </td>
            </tr>
        </table>
    </body>
</html>