<?php

namespace App\Http\Requests\Router;

use Illuminate\Foundation\Http\FormRequest;


class UpdateRouterRequest extends FormRequest
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
            "name"      => 'required|string|max:150',
            "number"      => 'required|string|max:150',
        ];
    }
}
