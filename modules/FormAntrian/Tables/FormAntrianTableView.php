<?php

namespace Modules\FormAntrian\Tables;

use Laravolt\Suitable\Columns\Numbering;
use Laravolt\Suitable\Columns\RestfulButton;
use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;
use Modules\FormAntrian\Models\FormAntrian;

class FormAntrianTableView extends TableView
{
    public function source()
    {
        return FormAntrian::autoSort()->latest()->autoSearch(request('search'))->paginate();
    }

    protected function columns()
    {
        return [
            Numbering::make('No'),
            Text::make('no_antrian')->sortable(),
            Text::make('user_id')->sortable(),
            Text::make('tgl_kunjungan')->sortable(),
            Text::make('laki-laki')->sortable(),
            Text::make('perempuan')->sortable(),
            Text::make('anak-anak')->sortable(),
            Text::make('total_pengikut')->sortable(),
            Text::make('jenis_barang')->sortable(),
            Text::make('jumlah')->sortable(),
            Text::make('keterangan')->sortable(),
            Text::make('id_napi')->sortable(),
            RestfulButton::make('modules::form-antrian'),
        ];
    }
}
