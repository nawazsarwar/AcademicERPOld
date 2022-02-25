<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCourseAcademicSessionRequest;
use App\Http\Requests\StoreCourseAcademicSessionRequest;
use App\Http\Requests\UpdateCourseAcademicSessionRequest;
use App\Models\AcademicSession;
use App\Models\Course;
use App\Models\CourseAcademicSession;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseAcademicSessionsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('course_academic_session_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseAcademicSessions = CourseAcademicSession::with(['academic_session', 'course'])->get();

        return view('admin.courseAcademicSessions.index', compact('courseAcademicSessions'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_academic_session_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academic_sessions = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.courseAcademicSessions.create', compact('academic_sessions', 'courses'));
    }

    public function store(StoreCourseAcademicSessionRequest $request)
    {
        $courseAcademicSession = CourseAcademicSession::create($request->all());

        return redirect()->route('admin.course-academic-sessions.index');
    }

    public function edit(CourseAcademicSession $courseAcademicSession)
    {
        abort_if(Gate::denies('course_academic_session_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academic_sessions = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courseAcademicSession->load('academic_session', 'course');

        return view('admin.courseAcademicSessions.edit', compact('academic_sessions', 'courseAcademicSession', 'courses'));
    }

    public function update(UpdateCourseAcademicSessionRequest $request, CourseAcademicSession $courseAcademicSession)
    {
        $courseAcademicSession->update($request->all());

        return redirect()->route('admin.course-academic-sessions.index');
    }

    public function show(CourseAcademicSession $courseAcademicSession)
    {
        abort_if(Gate::denies('course_academic_session_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseAcademicSession->load('academic_session', 'course');

        return view('admin.courseAcademicSessions.show', compact('courseAcademicSession'));
    }

    public function destroy(CourseAcademicSession $courseAcademicSession)
    {
        abort_if(Gate::denies('course_academic_session_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseAcademicSession->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseAcademicSessionRequest $request)
    {
        CourseAcademicSession::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
