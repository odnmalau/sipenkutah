@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::narapidana.index') }}"></x-backlink>

    <x-panel title="Edit Narapidana">
        {!! form()->bind($narapidana)->put(route('modules::narapidana.update', $narapidana->getKey()))->horizontal()->multipart()->autocomplete('off') !!}
        @include('narapidana::_form')
        {!! form()->close() !!}
    </x-panel>

@stop
