<?php

namespace Modules\FormAntrian\Models;

use Illuminate\Database\Eloquent\Model;
use Laravolt\Support\Traits\AutoFilter;
use Laravolt\Support\Traits\AutoSearch;
use Laravolt\Support\Traits\AutoSort;

class FormAntrian extends Model
{
    use AutoSearch, AutoSort, AutoFilter;

    protected $table = 'form_antrian';

    protected $guarded = [];

    protected $searchableColumns = ["no_antrian", "tgl_kunjungan", "laki-laki", "perempuan", "anak-anak", "total_pengikut", "jenis_barang", "jumlah", "keterangan", "id_napi",];
}
