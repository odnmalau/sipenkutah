@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::sipir.index') }}"></x-backlink>

    <x-panel title="Tambah Sipir">
        {!! form()->post(route('modules::sipir.store'))->horizontal()->multipart()->autocomplete('off') !!}
        @include('sipir::_form')
        {!! form()->close() !!}
    </x-panel>

@stop
