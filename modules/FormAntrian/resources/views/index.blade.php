@extends('laravolt::layouts.app')

@section('content')


    <x-titlebar title="FormAntrian">
        <x-item>
            <x-link label="Tambah" icon="plus" url="{{ route('modules::form-antrian.create') }}"></x-link>
        </x-item>
    </x-titlebar>

    {!! $table !!}
@stop
