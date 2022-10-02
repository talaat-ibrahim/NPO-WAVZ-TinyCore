<?php

namespace App\Http\Requests\UpsInstallations;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpsInstallationsRequest extends FormRequest
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
            "name"=> 'required|string|max:150',
        ];
    }
}
