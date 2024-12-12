<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'skills' => 'required|array',
            'skills.*' => 'exists:skills,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'github_url' => 'nullable|url', // Ensure a valid URL or null
            'live_link_url' => 'nullable|url', // Ensure it's a valid URL
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The project name is required.',
            'name.string' => 'The project name must be a string.',
            'name.max' => 'The project name cannot exceed 255 characters.',

            'description.required' => 'Please provide a description for the project.',

            'start_date.required' => 'A start date is required.',
            'start_date.date' => 'The start date must be a valid date.',

            'end_date.required' => 'An end date is required.',
            'end_date.date' => 'The end date must be a valid date.',
            'end_date.after_or_equal' => 'The end date must be the same or after the start date.',

            'github_url.url' => 'The GitHub URL must be a valid URL.',

            'live_link_url.required' => 'The live link URL is required.',
            'live_link_url.url' => 'The live link URL must be a valid URL.',
        ];
    }
}
