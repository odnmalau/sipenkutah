@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::pegawai.index') }}"></x-backlink>

    <x-panel title="Tambah Pegawai">
        {!! form()->post(route('modules::pegawai.store'))->horizontal()->multipart() !!}
        @include('pegawai::_form')
        {!! form()->close() !!}
    </x-panel>

@stop
