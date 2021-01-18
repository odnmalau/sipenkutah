@component('laravolt::mail.body')
    @component('laravolt::mail.headline', ['pass' => $pass])
        Hai {{ $pass['nama_pengunjung'] }}
    @endcomponent

    @component('laravolt::mail.message', ['pass' => $pass])
        Terkait pengajuan kunjungan tahanan {{ $pass['nama_napi'] }} yang
        Anda ajukan pada tanggal {{ $pass['tgl_kunjungan'] }}
        dengan waktu besuk {{ $pass['waktu'] }} telah berhasil silahkan datang sesuai dengan taggal<br>
        dan waktu ya. Dimohon untuk membawa email ini sebagai bukti nanti di Lembaga Pemasyarakatan.<br>
        Nomor antrian Anda adalah: {{ $pass['no_antrian'] }}
    @endcomponent

    @component('laravolt::mail.info')
        Jika Anda tidak merasa melakukan pengajuan ini, abaikan email ini.
    @endcomponent

@endcomponent