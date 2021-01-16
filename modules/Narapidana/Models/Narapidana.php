<?php

namespace Modules\Narapidana\Models;

use Illuminate\Database\Eloquent\Model;
use Laravolt\Support\Traits\AutoFilter;
use Laravolt\Support\Traits\AutoSearch;
use Laravolt\Support\Traits\AutoSort;

class Narapidana extends Model
{
    use AutoSearch, AutoSort, AutoFilter;

    protected $table = 'narapidana';

    protected $guarded = [];

    protected $searchableColumns = ["kewarganegaraan", "no_identitas", "nama_lengkap", "alamat", "tgl_lahir", "perkara", "tgl_masuk", "tahun", "bulan", "hari", "lama_pidana", "blok",];

    public function setKewarganegaraanAttribute($value)
    {
        $this->attributes['kewarganegaraan'] = ($value == 'WNI');
    }
}
