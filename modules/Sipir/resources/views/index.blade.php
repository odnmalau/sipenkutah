@extends('laravolt::layouts.app')

@section('content')


    <x-titlebar title="Sipir">
        <x-item>
            <x-link label="Tambah" icon="plus" url="{{ route('modules::sipir.create') }}"></x-link>
        </x-item>
    </x-titlebar>

    {!! $table !!}
@stop
