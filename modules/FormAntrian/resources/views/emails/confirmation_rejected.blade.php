@component('laravolt::mail.body')
    @component('laravolt::mail.headline', ['pass' => $pass])
        Hai {{ $pass['nama_pengunjung'] }}
    @endcomponent

    @component('laravolt::mail.message', ['pass' => $pass])
        Terkait pengajuan kunjungan tahanan {{ $pass['nama_napi'] }} yang Anda ajukan pada<br>
        {{ $pass['tgl_kunjungan'] }} - {{ $pass['waktu'] }} Kami tolak dikarenakan kuota untuk hari dan<br>
        waktu tersebut sudah melewati batas.<br>
        Silahkan membuat pengajuan antrian kembali melalui tombol dibawah ini Terima Kasih.
    @endcomponent

    @component('laravolt::mail.button', ['url' => route('modules::form-antrian.create')])
        Formulir Antrian
    @endcomponent

    @component('laravolt::mail.info')
        Jika Anda tidak merasa melakukan pengajuan ini, abaikan email ini.
    @endcomponent

@endcomponent