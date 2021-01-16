<?php

namespace Modules\Pengunjung\Requests;

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
            'no_identitas' => ['required'],
            'upload_identitas' => ['required'],
            'nama_lengkap' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required'],
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
