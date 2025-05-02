<?php

namespace App\Http\Requests\TabPane;

use Illuminate\Foundation\Http\FormRequest;

class ManuscriptTabPaneRequest extends FormRequest
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
            'manuscript_id' => 'nullable',
            'journal_id' => 'required|integer',
            'file' => 'required',
            'article_type_id' => 'required|in:1,2,3,4,5,6,7',
            'title' => 'required|string|max:255',
            'abstract' => 'required|string|max:255',
            'keyword' => 'required|string|max:255',
        ];
    }
    public function messages(): array
    {

        return [
            'article_type_id.required' => 'article type field is required',
            'journal_id.required' => 'journal field is required',
            'file.required' => 'MS Word file is required',
        ];
    }
}
