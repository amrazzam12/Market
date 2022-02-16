<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductStoreRequest extends FormRequest
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
            'title' => 'required|max:20',
            'slug' => 'required',
            'desc' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'sale' => 'required|integer',
            'condition' => 'required|in:new,used',
            'status' => 'required|in:active,inactive',
            'category' => ['required' , Rule::exists('categories' , 'id')],
            'subcategory' => ['required' , Rule::exists('categories' , 'id')]

        ];
    }
}
