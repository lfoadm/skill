<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tenant_id'     => 'required',
            'cnpj'          => 'required|max:18',
            'corporateName' => 'required|min:5',
            'fantasyName'   => 'required|min:5',
            'phone'         => 'max:15',
            'logo'          => 'nullable|image|mimes:jpeg,png,jpg,|max:2048',
            'email'         => 'required|email',
            'site'          => 'max:60',
            'instagram'     => 'max:60',

        ];
    }
}
