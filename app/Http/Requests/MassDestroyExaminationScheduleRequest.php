<?php

namespace App\Http\Requests;

use App\Models\ExaminationSchedule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExaminationScheduleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('examination_schedule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:examination_schedules,id',
        ];
    }
}
