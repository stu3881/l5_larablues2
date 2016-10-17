<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMiscThings extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [ 
        'record_type' => 'required',
        'report_name' => 'required',
        'report_query' => 'required',
        'bypassed_field_name' => 'required',
        'report_containing_menu' => 'required'
        ];
    }
}
