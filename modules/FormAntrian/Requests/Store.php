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
            'no_antrian' => [''],
            'tgl_kunjungan' => ['required'],
            'waktu' => [''],
            'laki-laki' => [''],
            'perempuan' => [''],
            'anak-anak' => [''],
            'total_pengikut' => [''],
            'jenis_barang' => [''],
            'jumlah' => [''],
            'keterangan' => [''],
            'status' => ['nullable'],
            'id_napi' => [''],
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
