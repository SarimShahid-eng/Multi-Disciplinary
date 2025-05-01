<?php

namespace App\Http\Requests\TabPane;

use Illuminate\Foundation\Http\FormRequest;

class StatementTabPaneRequest extends FormRequest
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
            'conflict_interest' => 'required|in:0,1',
            'conflict_interest_reason' => 'required_if:conflict_interest,1|nullable|string',

            'manuscript_version' => 'required|in:0,1',
            'manuscript_version_reason' => 'required_if:manuscript_version,1|nullable|string',

            'funding' => 'required|in:0,1',
            'funding_reason' => 'required_if:funding,1|nullable|string',

            'genAi' => 'required|in:0,1',
            'genAi_reason' => 'required_if:genAi,1|nullable|string',
        ];
    }
    public function messages(): array
    {
        return [
            'conflict_interest' => 'Commercial or financial interest field is required.',
            'conflict_interest_reason.required_if' => 'Commercial or financial explaination is required if  you have got any commercial or financial conflict of interest in the research.',
            'manuscript_version_reason.required' => 'Manuscript version field is required.',
            'manuscript_version_reason.required_if' => 'Previous version explaination is required if  you have got any previous version of this manuscript.',
            'funding_reason.required' => 'Funding field is required',
            'funding_reason.required_if' => 'Funding explaination is required if  you have got any funding received for this manuscript.',
            'genAi.required' => 'Gen AI field is required',
            'genAi_reason.required_if' => 'Gen AI explaination is required if  you have used any Gen AI tools for this manuscript.',
        ];
    }
}
