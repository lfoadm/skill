<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreTruckRequest extends FormRequest
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
            //'tenant_id'         => 'nullable',
            'user_id'           => 'required',
            //'status'            => 'required',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,|max:2048',
            'surname'           => 'nullable',
            'brand'             => 'required',
            'model'             => 'nullable',
            'yearManufacture'   => 'nullable',
            'modelYear'         => 'nullable',
            'plate'             => 'required|max:8',
            'chassis'           => 'nullable',
            'renavan'           => 'nullable',
            'UF'                => 'nullable',
            'color'             => 'nullable',
        ];
    }
}
