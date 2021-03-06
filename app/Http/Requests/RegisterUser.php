<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterUser extends Request
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
            //
            'nickname'=>'required|max:255',
            'username'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed'
        ];
    }
}
