<?php

namespace App\Http\Requests\TabPane;

use Illuminate\Foundation\Http\FormRequest;

class ReviewerTabPaneRequest extends FormRequest
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
            'reviewer_email'       => 'required|array',
            'reviewer_email.*'     => 'required|email|max:255',
            'reviewer_firstname'   => 'required|array',
            'reviewer_firstname.*' => 'required|string|max:255',
            'reviewer_lastname'   => 'required|array',
            'reviewer_lastname.*' => 'required|string|max:255',
            'reviewer_lastname'   => 'required|array',
            'reviewer_affiliation.*' => 'required|string|max:255',
            'reviewer_affiliation' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'reviewer_email.*.required' => 'Each Reviewer email is required',
            'reviewer_email.email' => 'Each Reviewer email must be a valid email address',
            'reviewer_firstname.*.required' => 'Each Reviewer firstname is required',
            'reviewer_lastname.*.required' => 'Each Reviewer lastname is required',
            'reviewer_affiliation.*.required' => 'Each Reviewer affiliation is required',
        ];
    }
}
