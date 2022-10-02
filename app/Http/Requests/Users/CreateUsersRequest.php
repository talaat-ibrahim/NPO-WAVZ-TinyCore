<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;


class CreateUsersRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name'          => 'required|string|max:150',
            'email'         => 'required|email|unique:users,email',
            'birthdays'         =>  'required',
            'nationality_id'    =>  'required',
            'address'           =>  'required',
            'tel1'              =>  'required',
            'tel2'              =>  'required',
            'password'      => 'required|string|min:8',
        ];
    }
}
