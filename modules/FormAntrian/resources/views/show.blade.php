@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::form-antrian.index') }}"></x-backlink>

    <x-panel title="Detil FormAntrian">
        <table class="ui table definition">
        <tr><td>Id</td><td>{{ $formAntrian->id }}</td></tr>
        <tr><td>No Antrian</td><td>{{ $formAntrian->no_antrian }}</td></tr>
        <tr><td>User Id</td><td>{{ $formAntrian->user_id }}</td></tr>
        <tr><td>Tgl Kunjungan</td><td>{{ $formAntrian->tgl_kunjungan }}</td></tr>
        <tr><td>Laki-Laki</td><td>{{ $formAntrian->laki-laki }}</td></tr>
        <tr><td>Perempuan</td><td>{{ $formAntrian->perempuan }}</td></tr>
        <tr><td>Anak-Anak</td><td>{{ $formAntrian->anak-anak }}</td></tr>
        <tr><td>Total Pengikut</td><td>{{ $formAntrian->total_pengikut }}</td></tr>
        <tr><td>Jenis Barang</td><td>{{ $formAntrian->jenis_barang }}</td></tr>
        <tr><td>Jumlah</td><td>{{ $formAntrian->jumlah }}</td></tr>
        <tr><td>Keterangan</td><td>{{ $formAntrian->keterangan }}</td></tr>
        <tr><td>Id Napi</td><td>{{ $formAntrian->id_napi }}</td></tr>
        <tr><td>Created At</td><td>{{ $formAntrian->created_at }}</td></tr>
        <tr><td>Updated At</td><td>{{ $formAntrian->updated_at }}</td></tr>
        </table>
    </x-panel>

@stop
