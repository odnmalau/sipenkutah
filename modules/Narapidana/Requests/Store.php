<?php

namespace Modules\Narapidana\Requests;

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
            'kewarganegaraan' => ['required'],
            'no_identitas' => ['required'],
            'nama_lengkap' => ['required'],
            'alamat' => ['required'],
            'tgl_lahir' => ['required'],
            'perkara' => ['required'],
            'tgl_masuk' => ['required'],
            'tahun' => ['required'],
            'bulan' => ['required'],
            'hari' => ['required'],
            'lama_pidana' => ['nullable'],
            'blok' => ['required'],
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
