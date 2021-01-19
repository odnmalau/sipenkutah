@extends('laravolt::layouts.app')
@push('style')
<link rel="stylesheet" type="text/css" data-turbolinks-track="reload" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
@endpush

@section('content')


    <x-titlebar title="FormAntrian">
        {{-- <x-item>
            <x-link label="Tambah" icon="plus" url="{{ route('modules::form-antrian.create') }}"></x-link>
        </x-item> --}}
    </x-titlebar>

    {!! $table !!}
@stop
@push('script')
    <script data-turbolinks-track="reload" src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small', color: '#1A91DA' });
        });

        $(document).ready(function(){
            $('.js-switch').change(function () {
                let status = $(this).prop('checked') == true ? "Diterima" : "Ditolak";
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('modules::statusChanges') }}',
                    data: {'status': status, 'id': id},
                    success: function (data) {
                        $('body').toast({"class":"black","message":data.message,"closeIcon":false,"displayTime":"auto","minDisplayTime":3000,"opacity":1,"position":"top center","compact":false,"showIcon":"green checkmark","showProgress":"bottom","progressUp":false,"pauseOnHover":true,"newestOnTop":true,"transition":{"showMethod":"fade","showDuration":2000,"hideMethod":"fly down","hideDuration":3000},"classProgress":"green"});
                        location.reload()
                    }
                });
            });
        });
    </script>
    <script>
        let elemsReject = Array.prototype.slice.call(document.querySelectorAll('.js-switch-reject'));

        elemsReject.forEach(function(html) {
            let switchery = new Switchery(html, { size: 'small', color: '#1A91DA' });
        });

        $(document).ready(function(){
            $('.js-switch-reject').change(function () {
                let status = $(this).prop('checked') == true ? "Ditolak" : "Diterima";
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('modules::statusChangesReject') }}',
                    data: {'status': status, 'id': id},
                    success: function (data) {
                        $('body').toast({"class":"black","message":data.message,"closeIcon":false,"displayTime":"auto","minDisplayTime":3000,"opacity":1,"position":"top center","compact":false,"showIcon":"green checkmark","showProgress":"bottom","progressUp":false,"pauseOnHover":true,"newestOnTop":true,"transition":{"showMethod":"fade","showDuration":2000,"hideMethod":"fly down","hideDuration":3000},"classProgress":"green"});
                        location.reload()
                    }
                });
            });
        });
    </script>
@endpush