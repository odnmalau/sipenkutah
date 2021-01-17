<?php

namespace Modules\Narapidana\Tables;

use Laravolt\Suitable\Columns\Checkall;
use Laravolt\Suitable\Columns\Label;
use Laravolt\Suitable\Columns\RestfulButton;
use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;
use Modules\Narapidana\Models\Narapidana;

class NarapidanaTableView extends TableView
{
    protected $title = 'Data Narapidana';

    protected $search = false;

    public function source()
    {
        return Narapidana::autoSort()->autoFilter()->latest()->autoSearch(request('search'))->paginate();
    }

    protected function columns()
    {
        return [
            Checkall::make('No'),
            Text::make('no_identitas')->sortable()->searchable(),
            Text::make('nama_lengkap')->sortable()->searchable(),
            Text::make('perkara')->sortable()->searchable(),
            Text::make('tgl_masuk', 'TERDAFTAR')->sortable(),
            Label::make('blok'),
            RestfulButton::make('modules::narapidana'),
        ];
    }
}
