@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::pegawai.index') }}"></x-backlink>

    <x-panel title="Detil Pegawai">
        <table class="ui table definition">
        <tr><td>Nip</td><td>{{ $pegawai->nip }}</td></tr>
        <tr><td>Nama</td><td>{{ $pegawai->nama }}</td></tr>
        <tr><td>Golongan</td><td>{{ $pegawai->golongan }}</td></tr>
        <tr><td>Jabatan</td><td>{{ $pegawai->jabatan }}</td></tr>
        <tr><td>Alamat</td><td>{{ $pegawai->alamat }}</td></tr>
        <tr><td>No Telp</td><td>{{ $pegawai->no_telp }}</td></tr>
        <tr><td>Foto</td><td><img src="{{ $pegawai->takeImage }}" alt="Foto" width="200"></td></tr>
        </table>
    </x-panel>

@stop
