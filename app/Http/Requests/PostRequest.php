<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        
                'title' => 'required|min:5',
                'body' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "ခေါင်းစည်းလိုသည်။", 
            'body.required' => "ကိုထည်လိုသည်",
            'title.min' => "အနည်းဆုံးစာလုံးရေငါးလုံးရှိရမည်",
            'body.min' => "အနည်းဆုံးစာလုံးရေငါးလုံးရှိရမည်"
        ];
    }
}
