<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'project_name' => 'required|string|min:2',
            'slug' => ['required', 'max:255', Rule::unique('projects')->ignore($this->project)],
            'description' => 'nullable|max:2000',
            'working_hours' => 'required|integer',
            'co_workers' => 'nullable|max:200',
            'type_id' => 'nullable|exists:types,id'
        ];
    }
}
