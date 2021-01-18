<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kunjungan Tahanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style type="text/css">
            table tr td,
            table tr th {
                font-size: 9pt;
            }
        </style>
</head>
<body>
    <center>
        <div class="text-center" data-role="brand">
            @if(strlen(config('laravolt.ui.brand_image')) > 0)
            <img src="{{ config('laravolt.ui.brand_image') }}" width="70" class="ui image centered {{ $class ?? 'tiny' }}">
            @endif
            <h4 class="m-0 ui header">
                Laporan Kunjungan Periode <br>
            </h4>
            <p>({{ $date[0] }} - {{ $date[1] }})</p>
        </div>
    </center><br>

    <table width="100%" class="table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No. Antrian</th>
                <th>Nama Pengunjung</th>
                <th>Tanggal Kunjungan</th>
                <th>Narapidana</th>
                <th>Status</th>
                <th>Nama Sipir</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @forelse ($report as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->no_antrian }}</td>
                    <td>{{ $item->pengunjung->name }}</td>
                    <td>{{ $item->tgl_kunjungan }}</td>
                    <td>{{ $item->napi->nama_lengkap }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->updated_by_name }}</td>
                </tr>
            @empty
                <td colspan="6" class="text-center">Tidak ada data</td>
            @endforelse
        </tbody>
    </table>
</body>
</html>