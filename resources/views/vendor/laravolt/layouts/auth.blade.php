@extends('laravolt::layouts.base')
@section('body')

    <div class="layout--split">

        <div class="x-inspire">
            <div class="x-inspire__content">
                <div class="ui container text text-center p-3 m-b-5">
                    @include('laravolt::components.brand')
                </div>
            </div>
        </div>


        <div class="x-auth">
            <div class="x-auth__content">

                <div class="ui divider hidden"></div>

                @yield('content')

                <div class="ui divider hidden"></div>

            </div>
        </div>
    </div>
@endsection
