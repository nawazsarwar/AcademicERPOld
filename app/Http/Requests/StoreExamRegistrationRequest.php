<?php

namespace App\Http\Requests;

use App\Models\ExamRegistration;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExamRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('exam_registration_create');
    }

    public function rules()
    {
        return [
            'student_id' => [
                'required',
                'integer',
            ],
            'course_id' => [
                'required',
                'integer',
            ],
            'type' => [
                'required',
            ],
            'academic_session_id' => [
                'required',
                'integer',
            ],
            'season' => [
                'string',
                'required',
            ],
            'faculty_no' => [
                'string',
                'required',
            ],
            'fraction' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'hall_id' => [
                'required',
                'integer',
            ],
            'hostel_id' => [
                'required',
                'integer',
            ],
            'room_no' => [
                'string',
                'nullable',
            ],
            'reviewed_at' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
