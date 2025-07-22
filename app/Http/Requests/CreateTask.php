<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTask extends FormRequest
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
            'task_name' => 'required|string',
            'task_description' => 'required|string',
            'task_type_id' => 'required|exists:task_type,id',
            'created_by' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'task_deadline' => 'required|string',
        ];
    }
}
