<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
        $rules = [
            'message' => 'string|required'
        ];

        if (!empty($this->input('images'))) {
            $photos = count($this->input('images'));
            foreach(range(0, $photos) as $index) {
                $rules['images.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
            }
        }

        return $rules;
    }
}
