@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::pengunjung.index') }}"></x-backlink>

    <x-panel title="Edit Pengunjung">
        {!! form()->bind($pengunjung)->put(route('modules::pengunjung.update', $pengunjung->getKey()))->horizontal()->multipart() !!}
        @include('pengunjung::_form')
        {!! form()->close() !!}
    </x-panel>

@stop
