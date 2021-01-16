<?php

namespace Modules\Pengunjung\Tables;

use Laravolt\Suitable\Columns\Numbering;
use Laravolt\Suitable\Columns\RestfulButton;
use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;
use Modules\Pengunjung\Models\Pengunjung;

class PengunjungTableView extends TableView
{
    public function source()
    {
        return Pengunjung::autoSort()->latest()->autoSearch(request('search'))->paginate();
    }

    protected function columns()
    {
        return [
            Numbering::make('No'),
            Text::make('no_identitas')->sortable(),
            Text::make('nama_lengkap')->sortable(),
            Text::make('no_hp')->sortable(),
            RestfulButton::make('modules::pengunjung'),
        ];
    }
}
