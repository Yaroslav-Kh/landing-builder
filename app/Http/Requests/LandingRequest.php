<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandingRequest extends FormRequest
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
     * @return array|string[]
     */
    public function messages()
    {

        return [
            'title.required'                =>  'Title - Required to fill ',
            'title.min'                     =>  'Title - Minimum number of characters  - 10',
            'title.max'                     =>  'Title - Maximum number of characters  - 100',
            'subtitle.required'             =>  'Subtitle - Required to fill ',
            'subtitle.min'                  =>  'Subtitle - Minimum number of characters  - 10',
            'subtitle.max'                  =>  'Subtitle - Maximum number of characters  - 100',
            'content.required'              =>  'Content - Required to fill ',
            'content.min'                   =>  'Content - Minimum number of characters  - 10',
            'content.max'                   =>  'Content - Maximum number of characters  - 500',
            'font_color.required'           =>  'Font color - Required to fill ',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image'         => 'required|mimes:jpg,png|dimensions:max_width=500,max_height=500',
            'title'         => 'required|min:10|max:100',
            'subtitle'      => 'required|min:10|max:100',
            'content'       => 'required|min:10|max:500',
            'font_color'    => 'required',
        ];
    }
}
