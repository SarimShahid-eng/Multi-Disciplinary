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
        return [
            'commercial_financial' => 'required|in:0,1',
            'commercial_financial_reason' => 'required_if:commercial_financial,1|nullable|string',

            'previous_version_exist' => 'required|in:0,1',
            'previous_version_exist_reason' => 'required_if:previous_version_exist,1|nullable|string',

            'is_funding_received' => 'required|in:0,1',
            'is_funding_received_reason' => 'required_if:is_funding_received,1|nullable|string',

            'gen_ai_use' => 'required|in:0,1',
            'gen_ai_use_reason' => 'required_if:gen_ai_use,1|nullable|string',
        ];
    }
    public function messages(): array
    {
        return [
            'commercial_financial_reason.required_if' => 'Commercial explaination is required if the you have got any commercial or financial interest.',
            'previous_version_exist_reason.required_if' => 'Previous version explaination is required if  you have got any previous version of this manuscript.',
            'is_funding_received_reason.required_if' => 'Funding explaination is required if  you have got any funding received for this manuscript.',
            'gen_ai_use_reason.required_if' => 'Gen AI explaination is required if  you have used any Gen AI tools for this manuscript.',
        ];
    }
}
