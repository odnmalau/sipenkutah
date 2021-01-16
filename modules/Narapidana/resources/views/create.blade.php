@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::narapidana.index') }}"></x-backlink>

    <x-panel title="Tambah Narapidana">
        {!! form()->post(route('modules::narapidana.store'))->horizontal()->multipart()->autocomplete('off') !!}
        @include('narapidana::_form')
        {!! form()->close() !!}
    </x-panel>

@stop
