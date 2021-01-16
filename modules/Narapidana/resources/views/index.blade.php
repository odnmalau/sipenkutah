@extends('laravolt::layouts.app')

@section('content')


    <x-titlebar title="Narapidana">
        <x-item>
            <x-link label="Tambah" icon="plus" url="{{ route('modules::narapidana.create') }}"></x-link>
        </x-item>
    </x-titlebar>

    {!! $table !!}
@stop
