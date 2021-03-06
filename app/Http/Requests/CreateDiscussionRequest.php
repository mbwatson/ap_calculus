<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class CreateDiscussionRequest extends Request
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
        return [
            'title' => 'required|max:50',
            'body' => 'required|max:2500',
            'channel_id' => 'required'
        ];
    }
}
