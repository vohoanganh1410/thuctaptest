<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStore extends FormRequest
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
    public function rules(): array
    {
        return [
            'name'=> 'required|string|unique:categories', 
            'slug' => 'required|string|max:100|unique:categories',
            'parent_id' => 'nullable|numeric',
            'status'=>'required|numeric',
            'description'=>'nullable|string|max:200',
        
        ];
    }
}
