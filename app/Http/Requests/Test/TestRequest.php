<?php

namespace App\Http\Requests\Test;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
            'full_name' => 'required|string',
            'test_date' => 'required|string|max:255',
            'test_location' => 'required|string|max:255',
            'grade' => 'integer',
            'evaluation_criteria' => 'integer',
            'user_id' => 'required'
        ];
    }
}
