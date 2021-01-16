<?php

namespace Modules\FormAntrian\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'no_antrian' => ['required'],
            'user_id' => ['required'],
            'tgl_kunjungan' => ['required'],
            'laki-laki' => ['required'],
            'perempuan' => ['required'],
            'anak-anak' => ['required'],
            'total_pengikut' => ['required'],
            'jenis_barang' => ['required'],
            'jumlah' => ['required'],
            'keterangan' => ['required'],
            'id_napi' => ['required'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
