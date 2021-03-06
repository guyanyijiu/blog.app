<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRolePost extends FormRequest
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
            'name' => 'bail|required|unique:roles,name,'.$this->route()->getParameter('role').'|max:255',
            'display_name' => 'bail|required|max:255',
            'description' => 'bail|required|max:255',
            'permissions' => 'array',
        ];
    }
}
