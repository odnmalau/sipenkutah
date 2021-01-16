@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::sipir.index') }}"></x-backlink>

    <x-panel title="Detil Sipir">
        <table class="ui table definition">
        <tr><td>Nama Lengkap</td><td>{{ $sipir->nama }}</td></tr>
        <tr><td>Alamat</td><td>{{ $sipir->alamat }}</td></tr>
        <tr><td>No. Telepon</td><td>{{ $sipir->no_telp }}</td></tr>
        <tr><td>Foto</td><td><img src="{{ $sipir->takeImage }}" alt="Foto" width="200"></td></tr>
        </table>
    </x-panel>

@stop
