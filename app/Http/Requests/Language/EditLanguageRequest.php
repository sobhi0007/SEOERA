<?php

namespace App\Http\Requests\Language;

use Illuminate\Foundation\Http\FormRequest;

class EditLanguageRequest extends FormRequest
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
        ];
    }
}
