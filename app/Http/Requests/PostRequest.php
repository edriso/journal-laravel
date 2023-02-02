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
            'title' => ['required', 'min:3'],
            'content' => ['required', 'min:10'],
            'author_id' => [
                'required',
                'exists:App\Models\User,id'
                // 'exists:Users,id'
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Post must have a title!',
            'content.required' => 'Post must have content!',
            // 'author_id.exists' => 'Author id not found!'
        ];
    }
}