<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UrlRequest extends Request
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
            'destination'       => 'required',
            'utm_source'        => 'required_with:utm',
            'utm_medium'        => 'required_with:utm',
            'utm_campaign'      => 'required_with:utm',
        ];
    }
}
