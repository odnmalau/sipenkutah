<?php

namespace Modules\FormAntrian\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Support\Traits\AutoFilter;
use Laravolt\Support\Traits\AutoSearch;
use Laravolt\Support\Traits\AutoSort;
use Modules\Narapidana\Models\Narapidana;

class FormAntrian extends Model
{
    use AutoSearch, AutoSort, AutoFilter;

    protected $table = 'form_antrian';

    protected $guarded = [];

    protected $searchableColumns = ["no_antrian", "tgl_kunjungan", "waktu", "laki-laki", "perempuan", "anak-anak", "total_pengikut", "jenis_barang", "jumlah", "keterangan", "status", "id_napi", "updated_by"];

    public function pengunjung()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function napi()
    {
        return $this->belongsTo(Narapidana::class, 'id_napi');
    }

    public function getUpdatedByNameAttribute()
    {
        return User::where('id', $this->updated_by)->pluck('name')->first();
    }
}
