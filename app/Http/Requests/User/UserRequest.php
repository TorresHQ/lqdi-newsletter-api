<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        $expectedKeys = [
            'name',
            'email',
            'password',
        ];

        $receivedKeys = array_keys($this->all());

        $unexpectedKeys = array_diff($receivedKeys, $expectedKeys);

        if(!empty($unexpectedKeys)){
            abort(422, 'Unexpected keys: ' . implode(', ', $unexpectedKeys));
        }
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules = array_map(function ($rule) {
                return str_replace('required', '', $rule);
            }, $rules);
        }

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
