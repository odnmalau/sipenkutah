<?php

namespace Modules\FormAntrian\Tables;

use Laravolt\Suitable\Columns\Checkall;
use Laravolt\Suitable\Columns\Date;
use Laravolt\Suitable\Columns\Label;
use Laravolt\Suitable\Columns\Raw;
use Laravolt\Suitable\Columns\RestfulButton;
use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;
use Modules\FormAntrian\Models\FormAntrian;

class FormAntrianTableView extends TableView
{
    protected $title = 'Data Form Antrian';

    protected $search = false;

    public function source()
    {
        return FormAntrian::autoSort()->autoFilter()->latest()->autoSearch(request('search'))->paginate();
    }

    protected function columns()
    {
        return [
            Checkall::make('No'),
            Text::make('no_antrian')->searchable()->sortable(),
            Raw::make(function ($formAntrian) {
                return $formAntrian->pengunjung->name;
            }, 'Pengunjung'),
            Date::make('tgl_kunjungan')->sortable()->searchable(),
            Text::make('waktu'),
            Raw::make(function ($formAntrian) {
                return $formAntrian->napi->nama_lengkap;
            }, 'Napi Kunjungan')->sortable(),
            Raw::make(function ($formAntrian) {
                if ($formAntrian->status == "Diterima") {
                    return "<input type='checkbox' data-id='{$formAntrian->id}' name='status'  class='js-switch' checked>";
                } else {
                    return "<input type='checkbox' data-id='{$formAntrian->id}' name='status'  class='js-switch'>";
                }
            }, 'Status'),
            RestfulButton::make('modules::form-antrian')->only("delete", "view"),
        ];
    }
}
