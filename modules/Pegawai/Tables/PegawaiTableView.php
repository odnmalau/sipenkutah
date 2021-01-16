<?php

namespace Modules\Pegawai\Tables;

use Laravolt\Suitable\Columns\Date;
use Laravolt\Suitable\Columns\Numbering;
use Laravolt\Suitable\Columns\RestfulButton;
use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;
use Modules\Pegawai\Models\Pegawai;

class PegawaiTableView extends TableView
{
    protected $title = 'Data Pegawai';

    public function source()
    {
        return Pegawai::autoSort()->latest()->autoSearch(request('search'))->paginate();
    }

    protected function columns()
    {
        return [
            Numbering::make('No')->sortable(),
            Text::make('nip')->sortable()->searchable(),
            Text::make('nama')->sortable()->searchable(),
            Text::make('no_telp'),
            Date::make('created_at'),
            RestfulButton::make('modules::pegawai'),
        ];
    }
}
