@extends('laravolt::layouts.app')

@section('content')


    <x-titlebar title="Pegawai">
        <x-item>
            <x-link label="Tambah" icon="plus" url="{{ route('modules::pegawai.create') }}"></x-link>
        </x-item>
    </x-titlebar>

    {!! $table !!}
@stop
