<?php

namespace App\Http\Requests\Language;

use Illuminate\Foundation\Http\FormRequest;

class CreateLanguageRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required|max:100|string',
            'slogan'=>'required|max:10|string',
            'image'=>'required|mimes:jpg,png,jpeg,gif,svg,jfif|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ];
    }
}
