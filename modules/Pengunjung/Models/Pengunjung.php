<?php

namespace Modules\Pengunjung\Models;

use Illuminate\Database\Eloquent\Model;
use Laravolt\Support\Traits\AutoFilter;
use Laravolt\Support\Traits\AutoSearch;
use Laravolt\Support\Traits\AutoSort;

class Pengunjung extends Model
{
    use AutoSearch, AutoSort, AutoFilter;

    protected $table = 'pengunjung';

    protected $guarded = [];

    protected $searchableColumns = ["no_identitas", "upload_identitas", "nama_lengkap", "jenis_kelamin", "alamat", "no_hp",];
}
