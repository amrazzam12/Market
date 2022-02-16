<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|min:3|max:20',
            'slug' => 'required|min:5',
            'parent_id' => ['required' , Rule::exists('categories' , 'id')] ,
            'status' => 'required|in:active,inactive'
        ];
    }
}
