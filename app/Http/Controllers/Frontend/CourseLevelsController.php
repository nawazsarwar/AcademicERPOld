<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCourseLevelRequest;
use App\Http\Requests\StoreCourseLevelRequest;
use App\Http\Requests\UpdateCourseLevelRequest;
use App\Models\CourseLevel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseLevelsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('course_level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseLevels = CourseLevel::all();

        return view('frontend.courseLevels.index', compact('courseLevels'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_level_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.courseLevels.create');
    }

    public function store(StoreCourseLevelRequest $request)
    {
        $courseLevel = CourseLevel::create($request->all());

        return redirect()->route('frontend.course-levels.index');
    }

    public function edit(CourseLevel $courseLevel)
    {
        abort_if(Gate::denies('course_level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.courseLevels.edit', compact('courseLevel'));
    }

    public function update(UpdateCourseLevelRequest $request, CourseLevel $courseLevel)
    {
        $courseLevel->update($request->all());

        return redirect()->route('frontend.course-levels.index');
    }

    public function show(CourseLevel $courseLevel)
    {
        abort_if(Gate::denies('course_level_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.courseLevels.show', compact('courseLevel'));
    }

    public function destroy(CourseLevel $courseLevel)
    {
        abort_if(Gate::denies('course_level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseLevel->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseLevelRequest $request)
    {
        CourseLevel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
