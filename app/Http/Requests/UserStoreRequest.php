<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
                'name' => 'required|max:20',
                'email' => 'required|email',
                'password' => 'required|min:1|max:30',
                'role' => 'required|in:admin,customer,vendor'
        ];
    }
}
