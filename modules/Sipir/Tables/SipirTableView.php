<?php

namespace Modules\Sipir\Tables;

use Laravolt\Suitable\Columns\Date;
use Laravolt\Suitable\Columns\Html;
use Laravolt\Suitable\Columns\Numbering;
use Laravolt\Suitable\Columns\RestfulButton;
use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;
use Modules\Sipir\Models\Sipir;

class SipirTableView extends TableView
{
    protected $title = 'Data Sipir';

    public function source()
    {
        return Sipir::autoSort()->latest()->autoSearch(request('search'))->paginate();
    }

    protected function columns()
    {
        return [
            Numbering::make('No')->sortable(),
            Text::make('nama')->sortable()->searchable(),
            Text::make('no_telp'),
            Date::make('created_at'),
            RestfulButton::make('modules::sipir'),
        ];
    }
}
