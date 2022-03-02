<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourseStudentRequest;
use App\Http\Requests\StoreCourseStudentRequest;
use App\Http\Requests\UpdateCourseStudentRequest;
use App\Models\AcademicSession;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Student;
use App\Models\User;
use App\Models\VerificationStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseStudentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('course_student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseStudents = CourseStudent::with(['course', 'user', 'student', 'session_admitted', 'verification_status', 'verified_by'])->get();

        return view('frontend.courseStudents.index', compact('courseStudents'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::pluck('enrolment_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $session_admitteds = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verification_statuses = VerificationStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.courseStudents.create', compact('courses', 'session_admitteds', 'students', 'users', 'verification_statuses', 'verified_bies'));
    }

    public function store(StoreCourseStudentRequest $request)
    {
        $courseStudent = CourseStudent::create($request->all());

        return redirect()->route('frontend.course-students.index');
    }

    public function edit(CourseStudent $courseStudent)
    {
        abort_if(Gate::denies('course_student_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::pluck('enrolment_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $session_admitteds = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verification_statuses = VerificationStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courseStudent->load('course', 'user', 'student', 'session_admitted', 'verification_status', 'verified_by');

        return view('frontend.courseStudents.edit', compact('courseStudent', 'courses', 'session_admitteds', 'students', 'users', 'verification_statuses', 'verified_bies'));
    }

    public function update(UpdateCourseStudentRequest $request, CourseStudent $courseStudent)
    {
        $courseStudent->update($request->all());

        return redirect()->route('frontend.course-students.index');
    }

    public function show(CourseStudent $courseStudent)
    {
        abort_if(Gate::denies('course_student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseStudent->load('course', 'user', 'student', 'session_admitted', 'verification_status', 'verified_by');

        return view('frontend.courseStudents.show', compact('courseStudent'));
    }

    public function destroy(CourseStudent $courseStudent)
    {
        abort_if(Gate::denies('course_student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseStudent->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseStudentRequest $request)
    {
        CourseStudent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
