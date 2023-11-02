<?php

namespace App\Http\Requests\Subscriber;

use Illuminate\Foundation\Http\FormRequest;

class SubscriberRequest extends FormRequest
{
    public function rules(): array
    {
        $expectedKeys = [
            'name',
            'email',
        ];

        $receivedKeys = array_keys($this->all());

        $unexpectedKeys = array_diff($receivedKeys, $expectedKeys);

        if(!empty($unexpectedKeys)){
            abort(422, 'Unexpected keys: ' . implode(', ', $unexpectedKeys));
        }
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:subscribers']
        ];

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules = array_map(function ($rule) {
                return str_replace('required', '', $rule);
            }, $rules);
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must be less than 255 characters',
            'email.required' => 'Email is required',
            'email.string' => 'Email must be a string',
            'email.email' => 'Email must be a valid email address',
            'email.max' => 'Email must be less than 255 characters',
            'email.unique' => 'Email must be unique',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
