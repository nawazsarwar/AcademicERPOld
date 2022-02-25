<?php

namespace App\Http\Requests;

use App\Models\ExaminationSchedule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExaminationScheduleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('examination_schedule_create');
    }

    public function rules()
    {
        return [
            'academic_session_id' => [
                'required',
                'integer',
            ],
            'paper_id' => [
                'required',
                'integer',
            ],
            'mode' => [
                'required',
            ],
            'centre' => [
                'string',
                'nullable',
            ],
            'start' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'booklet_pages' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'season' => [
                'string',
                'nullable',
            ],
        ];
    }
}
