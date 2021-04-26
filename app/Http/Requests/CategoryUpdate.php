<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdate extends FormRequest
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
         
            'name'=> 'unique:categories,name,' .$this->segment(3).',id', 
            'slug' => 'required|string|max:100|unique:categories,slug,'.$this->category->id,
            'status'=>'required|numeric',
            'parent_id' => 'nullable|numeric',
            'description'=>'nullable|string|max:200',
        
            
           
            
          
        ];
    }
}
