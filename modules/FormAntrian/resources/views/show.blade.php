@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::form-antrian.index') }}"></x-backlink>

    <x-panel title="Detil FormAntrian">
        <table class="ui table definition">
        <tr><td>No. Antrian</td><td>{{ $formAntrian->no_antrian }}</td></tr>
        <tr><td>Pengunjung</td><td>{{ $formAntrian->pengunjung->name }}</td></tr>
        <tr><td>Tgl Kunjungan</td><td>{{ $formAntrian->tgl_kunjungan }}</td></tr>
        <tr><td>Waktu</td><td>{{ $formAntrian->waktu }}</td></tr>
        <tr><td>Laki-Laki</td><td>{{ $formAntrian->{'laki-laki'} }}</td></tr>
        <tr><td>Perempuan</td><td>{{ $formAntrian->perempuan }}</td></tr>
        <tr><td>Anak-Anak</td><td>{{ $formAntrian->{'anak-anak'} }}</td></tr>
        <tr><td>Total Pengikut</td><td>{{ $formAntrian->total_pengikut }}</td></tr>
        <tr><td>Jenis Barang</td><td>{{ $formAntrian->jenis_barang }}</td></tr>
        <tr><td>Jumlah</td><td>{{ $formAntrian->jumlah }}</td></tr>
        <tr><td>Keterangan</td><td>{{ $formAntrian->keterangan }}</td></tr>
        <tr><td>Narapidana Kunjungan</td><td>{{ $formAntrian->napi->nama_lengkap }}</td></tr>
        <tr><td>Dibuat</td><td>{{ $formAntrian->created_at->format('d-M-Y') }}</td></tr>
        </table>
    </x-panel>

@stop
