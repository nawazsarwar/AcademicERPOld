<?php

namespace App\Http\Requests;

use App\Models\CourseAcademicSession;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCourseAcademicSessionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('course_academic_session_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:course_academic_sessions,id',
        ];
    }
}
