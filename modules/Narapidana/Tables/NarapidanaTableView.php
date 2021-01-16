<?php

namespace Modules\Narapidana\Tables;

use Laravolt\Suitable\Columns\Boolean;
use Laravolt\Suitable\Columns\Numbering;
use Laravolt\Suitable\Columns\RestfulButton;
use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;
use Modules\Narapidana\Models\Narapidana;

class NarapidanaTableView extends TableView
{
    public function source()
    {
        return Narapidana::autoSort()->latest()->autoSearch(request('search'))->paginate();
    }

    protected function columns()
    {
        return [
            Numbering::make('No'),
            Text::make('kewarganegaraan'),
            Text::make('nama_lengkap')->sortable(),
            Text::make('perkara')->sortable(),
            Text::make('tgl_masuk')->sortable(),
            Text::make('blok')->sortable(),
            RestfulButton::make('modules::narapidana'),
        ];
    }
}
