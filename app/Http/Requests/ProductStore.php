<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStore extends FormRequest
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
           
            'pro_name' => 'string|unique:products', 
            
            'pro_price'=>'required|numeric',          
            'pro_warranty'=>'string',
            'pro_accessories'=>'string',
            'pro_condition'=>'string',
            'pro_promotion'=>'string',
            'pro_status'=> 'string',
            'pro_content' => 'nullable|string|max:200',
            'pro_featured'=>'numeric|required',
            'cate_pro'=> 'required|array',
            'pro_img'=>'string|required',
            'pro_description' => 'string'
        ];
    }
}