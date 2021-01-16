<?php

namespace Modules\Pegawai\Requests;

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
            'nip' => ['required'],
            'nama' => ['required'],
            'golongan' => ['required'],
            'jabatan' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required'],
            'foto' => 'image|mimes:png,jpg,jpeg|max:2048',
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
