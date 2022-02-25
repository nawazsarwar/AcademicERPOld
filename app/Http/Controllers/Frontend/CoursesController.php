<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\AdmissionEntranceType;
use App\Models\Campus;
use App\Models\Course;
use App\Models\CourseLevel;
use App\Models\Degree;
use App\Models\Department;
use App\Models\ProgrammeDeliveryMode;
use App\Models\ProgrammeDurationType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CoursesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::with(['degree', 'campus', 'level', 'entrance_type', 'mode', 'duration_type', 'administrable'])->get();

        return view('frontend.courses.index', compact('courses'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degrees = Degree::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $campuses = Campus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $levels = CourseLevel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $entrance_types = AdmissionEntranceType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $modes = ProgrammeDeliveryMode::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $duration_types = ProgrammeDurationType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $administrables = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.courses.create', compact('administrables', 'campuses', 'degrees', 'duration_types', 'entrance_types', 'levels', 'modes'));
    }

    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->all());

        return redirect()->route('frontend.courses.index');
    }

    public function edit(Course $course)
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degrees = Degree::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $campuses = Campus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $levels = CourseLevel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $entrance_types = AdmissionEntranceType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $modes = ProgrammeDeliveryMode::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $duration_types = ProgrammeDurationType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $administrables = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $course->load('degree', 'campus', 'level', 'entrance_type', 'mode', 'duration_type', 'administrable');

        return view('frontend.courses.edit', compact('administrables', 'campuses', 'course', 'degrees', 'duration_types', 'entrance_types', 'levels', 'modes'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->all());

        return redirect()->route('frontend.courses.index');
    }

    public function show(Course $course)
    {
        abort_if(Gate::denies('course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->load('degree', 'campus', 'level', 'entrance_type', 'mode', 'duration_type', 'administrable');

        return view('frontend.courses.show', compact('course'));
    }

    public function destroy(Course $course)
    {
        abort_if(Gate::denies('course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseRequest $request)
    {
        Course::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
