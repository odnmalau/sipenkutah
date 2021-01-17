@extends(config('laravolt.auth.layout'))

@section('content')

<h3 class="ui header horizontal divider m-y-2 m-x-1">@lang('laravolt::auth.register')</h3>

<form class="ui form" method="POST" action="{{ route('register.pengunjung.store') }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="ui field input fluid big">
        <input type="text" name="no_identitas" placeholder="No. Identitas" value="{{ old('no_identitas') }}">
    </div>
    <div class="ui field input fluid big">
        <input type="file" name="upload_identitas" placeholder="Upload Identitas" value="{{ old('upload_identitas') }}">
    </div>
    <div class="ui field input fluid big">
        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="{{ old('nama_lengkap') }}">
    </div>
    <div class="ui field input fluid big">
        <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
    </div>
    <div class="ui field input fluid big">
        <select name="jenis_kelamin" id="">
            <option value="0">Laki-laki</option>
            <option value="1">Perempuan</option>
        </select>
    </div>
    <div class="ui field input fluid big">
        <textarea name="alamat" placeholder="Alamat" value="{{ old('alamat') }}"></textarea>
    </div>
    <div class="ui field input fluid big">
        <input type="number" name="no_hp" placeholder="No. Telepon" value="{{ old('no_hp') }}">
    </div>
    <button type="submit" class="ui button fluid primary  big">@lang('laravolt::auth.register')</button>
</form>

<div class="ui divider hidden section"></div>
@lang('laravolt::auth.already_registered?') <a href="{{ route('auth::login') }}"
    class="link">@lang('laravolt::auth.login_here')</a>

@endsection