@component('laravolt::mail.body')
    @component('laravolt::mail.headline', ['pass' => $pass])
        Hai {{ $pass['nama_pengunjung'] }}
    @endcomponent

    @component('laravolt::mail.message', ['pass' => $pass])
        Terkait pengajuan kunjungan tahanan {{ $pass['nama_napi'] }} yang Anda ajukan pada
        {{ $pass['tgl_kunjungan'] }} - {{ $pass['waktu'] }} telah berhasil silahkan datang sesuai dengan taggal
        dan waktu ya. Dimohon untuk membawa email ini sebagai bukti nanti di Lembaga Pemasyarakatan.
        Nomor antrian Anda adalah: {{ $pass['no_antrian'] }}
    @endcomponent

    @component('laravolt::mail.info')
        Jika Anda tidak merasa melakukan pengajuan ini, abaikan email ini.
    @endcomponent

@endcomponent