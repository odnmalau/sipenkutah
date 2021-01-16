@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::narapidana.index') }}"></x-backlink>

    <x-panel title="Detil Narapidana">
        <table class="ui table definition">
        <tr><td>Id</td><td>{{ $narapidana->id }}</td></tr>
        <tr><td>Kewarganegaraan</td><td>{{ $narapidana->kewarganegaraan ? 'WNA' : 'WNI' }}</td></tr>
        <tr><td>No Identitas</td><td>{{ $narapidana->no_identitas }}</td></tr>
        <tr><td>Nama Lengkap</td><td>{{ $narapidana->nama_lengkap }}</td></tr>
        <tr><td>Alamat</td><td>{{ $narapidana->alamat }}</td></tr>
        <tr><td>Tgl Lahir</td><td>{{ $narapidana->tgl_lahir }}</td></tr>
        <tr><td>Perkara</td><td>{{ $narapidana->perkara }}</td></tr>
        <tr><td>Tgl Masuk</td><td>{{ $narapidana->tgl_masuk }}</td></tr>
        <tr><td>Blok</td><td>{{ $narapidana->blok }}</td></tr>
        <tr><td>Tahun</td><td>{{ $narapidana->tahun }}</td></tr>
        <tr><td>Bulan</td><td>{{ $narapidana->bulan }}</td></tr>
        <tr><td>Hari</td><td>{{ $narapidana->hari }}</td></tr>
        <tr><td>Lama Pidana</td><td>{{ $narapidana->lama_pidana ? 'Seumur Hidup' : 'Hukuman Mati' }}</td></tr>
        </table>
    </x-panel>

@stop
