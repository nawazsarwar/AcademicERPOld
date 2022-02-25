<?php

namespace App\Http\Requests;

use App\Models\CourseUser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCourseUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('course_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:course_users,id',
        ];
    }
}
