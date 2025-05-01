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
        // dd($this->all());
        return [
            'manuscript_id' => 'required',
            'suggested_reviewer_1_email' => 'required|email',
            'suggested_reviewer_1_firstname' => 'required',
            'suggested_reviewer_1_lastname' => 'required',
            'suggested_reviewer_1_affiliation' => 'required',
            'suggested_reviewer_2_email' => 'required|email',
            'suggested_reviewer_2_firstname' => 'required',
            'suggested_reviewer_2_lastname' => 'required',
            'suggested_reviewer_2_affiliation' => 'required',
            'suggested_reviewer_3_email' => 'required|email',
            'suggested_reviewer_3_firstname' => 'required',
            'suggested_reviewer_3_lastname' => 'required',
            'suggested_reviewer_3_affiliation' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'suggested_reviewer_1_email.required' => 'Suggested Reviewer 1 email is required',
            'suggested_reviewer_1_email.email' => 'Suggested Reviewer 1 email must be a valid email address',
            'suggested_reviewer_1_firstname.required' => 'Suggested Reviewer 1 firstname is required',
            'suggested_reviewer_1_lastname.required' => 'Suggested Reviewer 1 lastname is required',
            'suggested_reviewer_1_affiliation.required' => 'Suggested Reviewer 1 lastname is required',
            'suggested_reviewer_2_email.required' => 'Suggested Reviewer 2 email is required',
            'suggested_reviewer_2_email.email' => 'Suggested Reviewer 2 email must be a valid email address',
            'suggested_reviewer_2_firstname.required' => 'Suggested Reviewer 2 firstname is required',
            'suggested_reviewer_2_lastname.required' => 'Suggested Reviewer 2 lastname is required',
            'suggested_reviewer_2_affiliation.required' => 'Suggested Reviewer 2 lastname is required',
            'suggested_reviewer_3_email.required' => 'Suggested Reviewer 3 email is required',
            'suggested_reviewer_3_email.email' => 'Suggested Reviewer 3 email must be a valid email address',
            'suggested_reviewer_3_firstname.required' => 'Suggested Reviewer 3 firstname is required',
            'suggested_reviewer_3_lastname.required' => 'Suggested Reviewer 3 lastname is required',
            'suggested_reviewer_3_affiliation.required' => 'Suggested Reviewer 3 lastname is required',

        ];
    }
}
