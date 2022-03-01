<?php

namespace App\Http\Requests;

use App\Models\HallStudent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHallStudentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hall_student_create');
    }

    public function rules()
    {
        return [
            'hall_id' => [
                'required',
                'integer',
            ],
            'room_no' => [
                'string',
                'nullable',
            ],
            'student_id' => [
                'required',
                'integer',
            ],
            'allotment_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'allotted_on' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
