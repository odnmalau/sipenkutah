@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::form-antrian.index') }}"></x-backlink>

    <x-panel title="Edit FormAntrian">
        {!! form()->bind($formAntrian)->put(route('modules::form-antrian.update', $formAntrian->getKey()))->horizontal()->multipart() !!}
        @include('form-antrian::_form')
        {!! form()->close() !!}
    </x-panel>

@stop
