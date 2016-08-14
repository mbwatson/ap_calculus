<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class CreateQuestionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     * Any signed-in user has authorization to make this request.
     * 
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Question title, body, and standards are required fields and 
        // body can be no longer than 1000 characters
        return [
            'title' => 'required|max:100',
            'body' => 'required|max:5000',
            'standards' => 'required',
            'type' => 'required',
            'calculator' => 'required'
        ];
    }
}
