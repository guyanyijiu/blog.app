<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionPost extends FormRequest
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
            'name' => 'bail|required|unique:permissions|max:255',
            'pid' => 'bail|required|numeric',
            'display_name' => 'bail|required|unique:permissions|max:255',
            'description' => 'bail|max:255',
        ];
    }
}
