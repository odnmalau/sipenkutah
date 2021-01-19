<?php

namespace Modules\FormAntrian\Tables;

use Laravolt\Suitable\Columns\Checkall;
use Laravolt\Suitable\Columns\Date;
use Laravolt\Suitable\Columns\Label;
use Laravolt\Suitable\Columns\Raw;
use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;
use Modules\FormAntrian\Models\FormAntrian;

class HistoryTableView extends TableView
{
    protected $title = 'Data History Kunjungan';

    protected $search = false;

    public function source()
    {
        return FormAntrian::autoSort()->autoFilter()->latest()->autoSearch(request('search'))->paginate();
    }

    protected function columns()
    {
        return [
            Checkall::make('No'),
            Text::make('no_antrian'),
            Raw::make(function ($formAntrian) {
                return $formAntrian->pengunjung->name;
            }, 'Pengunjung'),
            Date::make('tgl_kunjungan')->sortable(),
            Raw::make(function ($formAntrian) {
                return $formAntrian->napi->nama_lengkap;
            }, 'Napi Kunjungan')->sortable(),
            Label::make('status')
                ->addClassIf('Proses', 'grey')
                ->addClassIf('Ditolak', 'red')
                ->addClassIf('Diterima', 'blue')->sortable(),
            Raw::make(function ($formAntrian) {
                return $formAntrian->updated_by_name;
            }, 'Nama Sipir')->sortable(),
        ];
    }
}
