@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::sipir.index') }}"></x-backlink>

    <x-panel title="Edit Sipir">
        {!! form()->bind($sipir)->put(route('modules::sipir.update', $sipir->getKey()))->horizontal()->multipart()->autocomplete('off') !!}
        @include('sipir::_form')
        {!! form()->close() !!}
    </x-panel>

@stop
