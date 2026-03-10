<?php

namespace App\Http\Requests;

use App\Traits\AjaxResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AjaxRequest extends FormRequest
{
   use AjaxResponse;

   protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            $this->error(
                message: 'Validation failed',
                status: 422,
                errors: $validator->errors()
            )
        );
    }
}
