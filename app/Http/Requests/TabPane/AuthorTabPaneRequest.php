<?php

namespace App\Http\Requests\TabPane;

use Illuminate\Foundation\Http\FormRequest;

class AuthorTabPaneRequest extends FormRequest
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
            'manuscript_id' => 'required',
            'manuscript_author_id' => 'nullable',
            'author_email'       => 'required|array',
            'author_email.*' => 'required|email|max:255|distinct',

            'author_country'       => 'required|array',
            'author_country.*'     => 'required|string|max:255',

            'author_title'       => 'required|array',
            'author_title.*'     => 'required|string|max:255',

            'author_firstname'   => 'required|array',
            'author_firstname.*' => 'required|string|max:255',

            'author_middlename'  => 'nullable|array',
            'author_middlename.*' => 'nullable|string|max:255',

            'author_lastname'    => 'required|array',
            'author_lastname.*'  => 'required|string|max:255',
            'author_affiliation.*' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // Check if it has exactly 6 comma-separated components
                    if (count(array_filter(explode(',', $value))) < 5) {
                        $fail('Each affiliation must contain Department, College, University name, City, Postcode separated by commas.');
                    }
                },
            ],
            'author_co_author'   => 'nullable|array',
            'author_co_author.*' => 'nullable|in:0,1',
        ];
    }
    public function messages(): array
    {
        return [
            'author_email.*.distinct'    => 'Same email addresses are not allowed. Each author must have a unique email address.',
            'author_email.*.max'         => 'Each author email must not exceed 255 characters.',
            'author_email.*.email'        => 'Each email must be a valid email format.',
            'author_email.*.required'     => 'Each author must have a valid email address.',
            'author_country.*.required'     => 'Each author must have a country.',
            'author_title.*.required' => 'Each author must have a Title.',
            'author_firstname.*.required' => 'Each author must have a first name.',
            'author_lastname.*.required'  => 'Each author must have a last name.',
            'author_affiliation.*.required' => 'Each author must have an affiliation.',
        ];
    }
}
