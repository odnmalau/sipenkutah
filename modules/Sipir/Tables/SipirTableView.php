<?php

namespace Modules\Sipir\Tables;

use Laravolt\Suitable\Columns\Numbering;
use Laravolt\Suitable\Columns\RestfulButton;
use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;
use Modules\Sipir\Models\Sipir;

class SipirTableView extends TableView
{
    public function source()
    {
        return Sipir::autoSort()->latest()->autoSearch(request('search'))->paginate();
    }

    protected function columns()
    {
        return [
            Numbering::make('No')->sortable(),
            Text::make('foto'),
            Text::make('nama')->sortable()->searchable(),
            Text::make('no_telp'),
            RestfulButton::make('modules::sipir'),
        ];
    }
}
