@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::pegawai.index') }}"></x-backlink>

    <x-panel title="Edit Pegawai">
        {!! form()->bind($pegawai)->put(route('modules::pegawai.update', $pegawai->getKey()))->horizontal()->multipart() !!}
        @include('pegawai::_form')
        {!! form()->close() !!}
    </x-panel>

@stop
