<?php

namespace Modules\Sipir\Models;

use Illuminate\Database\Eloquent\Model;
use Laravolt\Support\Traits\AutoFilter;
use Laravolt\Support\Traits\AutoSearch;
use Laravolt\Support\Traits\AutoSort;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Sipir extends Model implements HasMedia
{
    use AutoSearch, AutoSort, AutoFilter, InteractsWithMedia;

    protected $table = 'sipir';

    protected $guarded = [];

    protected $searchableColumns = ['nama', 'alamat', 'no_telp', 'foto'];

    public function getTakeImageAttribute()
    {
        return '/storage/'.$this->foto;
    }
}
