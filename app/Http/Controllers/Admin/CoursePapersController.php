<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCoursePaperRequest;
use App\Http\Requests\StoreCoursePaperRequest;
use App\Http\Requests\UpdateCoursePaperRequest;
use App\Models\AcademicSession;
use App\Models\Course;
use App\Models\CoursePaper;
use App\Models\Paper;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CoursePapersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('course_paper_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coursePapers = CoursePaper::with(['course', 'paper', 'academic_session'])->get();

        return view('admin.coursePapers.index', compact('coursePapers'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_paper_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $papers = Paper::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academic_sessions = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.coursePapers.create', compact('academic_sessions', 'courses', 'papers'));
    }

    public function store(StoreCoursePaperRequest $request)
    {
        $coursePaper = CoursePaper::create($request->all());

        return redirect()->route('admin.course-papers.index');
    }

    public function edit(CoursePaper $coursePaper)
    {
        abort_if(Gate::denies('course_paper_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $papers = Paper::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academic_sessions = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $coursePaper->load('course', 'paper', 'academic_session');

        return view('admin.coursePapers.edit', compact('academic_sessions', 'coursePaper', 'courses', 'papers'));
    }

    public function update(UpdateCoursePaperRequest $request, CoursePaper $coursePaper)
    {
        $coursePaper->update($request->all());

        return redirect()->route('admin.course-papers.index');
    }

    public function show(CoursePaper $coursePaper)
    {
        abort_if(Gate::denies('course_paper_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coursePaper->load('course', 'paper', 'academic_session');

        return view('admin.coursePapers.show', compact('coursePaper'));
    }

    public function destroy(CoursePaper $coursePaper)
    {
        abort_if(Gate::denies('course_paper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coursePaper->delete();

        return back();
    }

    public function massDestroy(MassDestroyCoursePaperRequest $request)
    {
        CoursePaper::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
