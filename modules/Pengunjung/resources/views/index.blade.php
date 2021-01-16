@extends('laravolt::layouts.app')

@section('content')


    <x-titlebar title="Pengunjung">
        <x-item>
            <x-link label="Tambah" icon="plus" url="{{ route('modules::pengunjung.create') }}"></x-link>
        </x-item>
    </x-titlebar>

    {!! $table !!}
@stop
