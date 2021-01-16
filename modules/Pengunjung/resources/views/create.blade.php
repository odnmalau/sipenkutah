@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::pengunjung.index') }}"></x-backlink>

    <x-panel title="Tambah Pengunjung">
        {!! form()->post(route('modules::pengunjung.store'))->horizontal()->multipart() !!}
        @include('pengunjung::_form')
        {!! form()->close() !!}
    </x-panel>

@stop
