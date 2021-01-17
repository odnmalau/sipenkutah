@component('laravolt::mail.body')
    @component('laravolt::mail.headline')
        Akun Anda Telah Teraktivasi
    @endcomponent

    @component('laravolt::mail.message')
        Silakan login dengan menggunakan Email Anda dan Password dapat diisi menggunakan nomor telepon Anda:
    @endcomponent


    @component('laravolt::mail.button', ['url' => route('auth::login')])
        Login
    @endcomponent

    @component('laravolt::mail.info')
        Jika Anda tidak merasa melakukan pendaftaran di <strong>{{ config('app.url') }}</strong>, abaikan email ini.
    @endcomponent

@endcomponent