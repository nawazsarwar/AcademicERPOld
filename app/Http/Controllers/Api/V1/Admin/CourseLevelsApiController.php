<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseLevelRequest;
use App\Http\Requests\UpdateCourseLevelRequest;
use App\Http\Resources\Admin\CourseLevelResource;
use App\Models\CourseLevel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseLevelsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('course_level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseLevelResource(CourseLevel::all());
    }

    public function store(StoreCourseLevelRequest $request)
    {
        $courseLevel = CourseLevel::create($request->all());

        return (new CourseLevelResource($courseLevel))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CourseLevel $courseLevel)
    {
        abort_if(Gate::denies('course_level_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseLevelResource($courseLevel);
    }

    public function update(UpdateCourseLevelRequest $request, CourseLevel $courseLevel)
    {
        $courseLevel->update($request->all());

        return (new CourseLevelResource($courseLevel))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CourseLevel $courseLevel)
    {
        abort_if(Gate::denies('course_level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseLevel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
