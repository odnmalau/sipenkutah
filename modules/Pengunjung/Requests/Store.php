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
            'foto' => 'image|mimes:png,jpg,jpeg|max:2048',
            'nama_lengkap' => ['required'],
            'email' => 'required|email',
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
