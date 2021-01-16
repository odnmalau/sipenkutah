<?php

namespace Modules\Pegawai\Models;

use Illuminate\Database\Eloquent\Model;
use Laravolt\Support\Traits\AutoFilter;
use Laravolt\Support\Traits\AutoSearch;
use Laravolt\Support\Traits\AutoSort;

class Pegawai extends Model
{
    use AutoSearch, AutoSort, AutoFilter;

    protected $table = 'pegawai';

    protected $guarded = [];

    protected $searchableColumns = ["nip", "nama", "golongan", "jabatan", "alamat", "no_telp", "foto",];
}
