<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourseUserRequest;
use App\Http\Requests\StoreCourseUserRequest;
use App\Http\Requests\UpdateCourseUserRequest;
use App\Models\AcademicSession;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;
use App\Models\VerificationStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseUserController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('course_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseUsers = CourseUser::with(['course', 'user', 'admitted_in', 'verification_status', 'verified_by'])->get();

        return view('admin.courseUsers.index', compact('courseUsers'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $admitted_ins = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verification_statuses = VerificationStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.courseUsers.create', compact('admitted_ins', 'courses', 'users', 'verification_statuses', 'verified_bies'));
    }

    public function store(StoreCourseUserRequest $request)
    {
        $courseUser = CourseUser::create($request->all());

        return redirect()->route('admin.course-users.index');
    }

    public function edit(CourseUser $courseUser)
    {
        abort_if(Gate::denies('course_user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $admitted_ins = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verification_statuses = VerificationStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courseUser->load('course', 'user', 'admitted_in', 'verification_status', 'verified_by');

        return view('admin.courseUsers.edit', compact('admitted_ins', 'courseUser', 'courses', 'users', 'verification_statuses', 'verified_bies'));
    }

    public function update(UpdateCourseUserRequest $request, CourseUser $courseUser)
    {
        $courseUser->update($request->all());

        return redirect()->route('admin.course-users.index');
    }

    public function show(CourseUser $courseUser)
    {
        abort_if(Gate::denies('course_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseUser->load('course', 'user', 'admitted_in', 'verification_status', 'verified_by');

        return view('admin.courseUsers.show', compact('courseUser'));
    }

    public function destroy(CourseUser $courseUser)
    {
        abort_if(Gate::denies('course_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseUser->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseUserRequest $request)
    {
        CourseUser::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
