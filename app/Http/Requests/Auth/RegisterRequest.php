<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\AjaxRequest;

class RegisterRequest extends AjaxRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','string','min:5','confirmed'],
            'register_as' => ['required'],
        ];
    }
}
