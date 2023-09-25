<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255', // The title is required, a string, and has a maximum length of 255 characters.
            'content' => 'required|string', // The content is required and must be a string.
            'course_id' => 'required|exists:courses,id', // The course_id is required and must exist in the "courses" table.
        ];
    }
}
