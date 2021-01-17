<?php

namespace Modules\Pengunjung\Tables;

use Laravolt\Suitable\Columns\Checkall;
use Laravolt\Suitable\Columns\Date;
use Laravolt\Suitable\Columns\RestfulButton;
use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;
use Modules\Pengunjung\Models\Pengunjung;

class PengunjungTableView extends TableView
{
    protected $title = 'Data Pengunjung';

    protected $search = false;

    public function source()
    {
        return Pengunjung::autoSort()->autoFilter()->latest()->autoSearch(request('search'))->paginate();
    }

    protected function columns()
    {
        return [
            Checkall::make('No'),
            Text::make('no_identitas')->sortable()->searchable(),
            Text::make('nama_lengkap')->sortable()->searchable(),
            Text::make('no_hp'),
            Date::make('created_at', 'TERDAFTAR')->sortable(),
            RestfulButton::make('modules::pengunjung'),
        ];
    }
}
