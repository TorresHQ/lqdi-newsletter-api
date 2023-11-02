<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function rules(): array
    {
        $expectedKeys = [
            'email',
            'password',
        ];

        $receivedKeys = array_keys($this->all());

        $unexpectedKeys = array_diff($receivedKeys, $expectedKeys);

        if(!empty($unexpectedKeys)){
            abort(422, 'Unexpected keys: ' . implode(', ', $unexpectedKeys));
        }
        $rules = [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'max:60'],
        ];

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
