<?php

namespace Modules\Pegawai\Tables;

use Laravolt\Suitable\Columns\Checkall;
use Laravolt\Suitable\Columns\Date;
use Laravolt\Suitable\Columns\RestfulButton;
use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;
use Modules\Pegawai\Models\Pegawai;

class PegawaiTableView extends TableView
{
    protected $title = 'Data Pegawai';

    protected $search = false;

    public function source()
    {
        return Pegawai::autoSort()->autoFilter()->latest()->autoSearch(request('search'))->paginate();
    }

    protected function columns()
    {
        return [
            Checkall::make('No'),
            Text::make('nip')->sortable()->searchable(),
            Text::make('nama')->sortable()->searchable(),
            Text::make('no_telp'),
            Date::make('created_at', 'TERDAFTAR'),
            RestfulButton::make('modules::pegawai'),
        ];
    }
}
