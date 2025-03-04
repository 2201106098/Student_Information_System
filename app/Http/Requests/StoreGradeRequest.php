<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
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
            'student_id' => ['required', 'exists:students,id'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'midterm' => ['required', 'regex:/^(?:INC|[1-4](?:\.(?:00?|25|50?|75)|\.0)|5\.0?)$/'],
            'finals' => ['required', 'regex:/^(?:INC|[1-4](?:\.(?:00?|25|50?|75)|\.0)|5\.0?)$/'],
        ];
    }

    public function messages(): array
    {
        return [
            'midterm.regex' => 'Midterm grade must be between 1.0 and 5.0 (in 0.25 increments) or INC',
            'finals.regex' => 'Finals grade must be between 1.0 and 5.0 (in 0.25 increments) or INC',
        ];
    }
}
