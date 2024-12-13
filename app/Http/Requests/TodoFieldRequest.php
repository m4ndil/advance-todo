<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoFieldRequest extends FormRequest
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
            'task_title' => 'required|string|max:255|unique:todos,task_title',//unique tablename column
            'task_description' => 'required|string',
            'task_start_date' => 'required|date|before_or_equal:task_end_date', 
            'task_end_date' => 'required|date|after_or_equal:task_start_date', 
            'priority' => 'required|in:low,mid,high',
            'is_task_near' => 'required|boolean',
            'is_task_overdue' => 'required|boolean', 
        ];
    }

    public function messages()
    {
        return [
            'task_title.required' => 'The task title is required.',
            'task_title.unique' => 'The task title must be a unique title.',
            'task_description.required' => 'The task description is required.',
            'task_start_date.required' => 'The start date is required.',
            'task_end_date.required' => 'The end date is required.',
            'priority.required' => 'The priority is required.',
            'is_task_near.required' => 'The near task flag is required.',
            'is_task_overdue.required' => 'The overdue task flag is required.',
        ];
    }
}
