<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHallStudentRequest;
use App\Http\Requests\UpdateHallStudentRequest;
use App\Http\Resources\Admin\HallStudentResource;
use App\Models\HallStudent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HallStudentApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hall_student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HallStudentResource(HallStudent::with(['hall', 'hostel', 'student', 'allotted_by'])->get());
    }

    public function store(StoreHallStudentRequest $request)
    {
        $hallStudent = HallStudent::create($request->all());

        return (new HallStudentResource($hallStudent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HallStudent $hallStudent)
    {
        abort_if(Gate::denies('hall_student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HallStudentResource($hallStudent->load(['hall', 'hostel', 'student', 'allotted_by']));
    }

    public function update(UpdateHallStudentRequest $request, HallStudent $hallStudent)
    {
        $hallStudent->update($request->all());

        return (new HallStudentResource($hallStudent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HallStudent $hallStudent)
    {
        abort_if(Gate::denies('hall_student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hallStudent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
